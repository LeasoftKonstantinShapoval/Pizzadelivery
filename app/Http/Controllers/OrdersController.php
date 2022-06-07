<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        return view('admin_orders', ['orders' => Orders::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return bool
     */
    public function create(Request $request)
    {
        if (!empty($request)){

            $productIds = array();
            foreach ($request->orderData as $datum){
               $productIds[$datum['id']] = $datum['counter'] ;
            }

            if (Auth::check()){
                $user = User::find(Auth::user()->id);
                if (!empty($request->totalPrice)){
                    //10% від загальної сумми заказу
                    if ($request->useBonuses == 1){
                        if (intval($user->bonus) >= intval($request->totalPrice)){
                            $mathBonus = intval($user->bonus) - intval($request->totalPrice);
                            $user->bonus = $mathBonus;
                        }elseif (intval($user->bonus) < intval($request->totalPrice)){
                            $mathBonus = intval($request->totalPrice) - intval($user->bonus) ;
                            $user->bonus = intval(0 + ($mathBonus * (10 / 100)));
                        }
                    }else{
                        $user->bonus = intval($user->bonus + ($request->totalPrice * (10 / 100)));
                    }
                    $user->save();
                }
            }


            $order = Orders::create([
                'product_ids' =>  json_encode($productIds),
                'total_price' => $request->totalPrice,
                'payment_type' => $request->paymentType,
                'user_name' => $request->username,
                'address_delivery' => $request->address,
                'phone_number' => $request->phoneNumber,
                'created_at' => Carbon::now(),
                'accepted' => false,
                'delivered' => false,
                'user_id' => Auth::check() ? Auth::user()->id : null,
            ]);

            return $order->id;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(Request $request)
    {
        return view('cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $order = Orders::find($id);

        $productsCollection = new Collection();
        foreach (json_decode($order['product_ids']) as $id => $count){
           $product = Products::find($id);
           $product->count = $count;
           $productsCollection->push($product);
        }

        return view('order', [
            'order' => $order,
            'products' => $productsCollection,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $user_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function showUserOrders(int $user_id)
    {
        $user = User::findOrFail($user_id);
        $orders = $user->getUserOrders;

//        $productsCollection = new Collection();
//        foreach (json_decode($order['product_ids']) as $id => $count){
//
//           $product = Products::findorFail($id);
//           $product->count = $count;
//           $productsCollection->push($product);
//        }

        return view('profilehistory', [
            'orders' => $orders,
//            'products' => $productsCollection,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        return view('order', Orders::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Orders $order)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        if (!empty($request->submitAccept)){
            $order->accepted = $request->submitAccept;
        }
        if (!empty($request->submitDelivery)){
            $order->delivered = $request->submitDelivery;
        }

        $order->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $order
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Products $order)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
       $order->delete();

       return redirect()->back();
    }
}
