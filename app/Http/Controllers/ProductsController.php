<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('index', [
            'pizzas' => Products::where('category_id', '=', 1)->get()->all(),
            'drinks' => Products::where('category_id', '=', 2)->get()->all()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function adminProducts()
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        return view('admin_items', ['products' => Products::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(Request $request)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        if (!empty($request->post())){

            Products::create([
                'name' => $request->post('productName'),
                'description' => $request->post('sklad'),
                'category_id' => $request->post('catName'),
                'price' => $request->post('price'),
                'weight' => $request->post('weight'),
                'photo' => base64_encode(file_get_contents($request->file('photo')->path())),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);
        }
        return redirect('admin_items');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|Redirector|RedirectResponse
     */
    public function store()
    {
        return view('admin_create_item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        return view('admin_edit_item', [
            'product' => Products::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        $query = DB::table('products')->where('id', '=', $id);
        if (!empty($request->productName)){
            $query->update(['name' => $request->productName]);
        }
        if (!empty($request->price)){
            $query->update(['price'=>  $request->price]);
        }
        if (!empty($request->weight)){
            $query->update(['weight'=>  $request->weight]);
        }
        if (!empty($request->photo)){
            $query->update(['photo'=> base64_encode(file_get_contents($request->file('photo')->path()))]);
        }
        if (!empty($request->sklad)){
            $query->update(['description'=>  $request->sklad]);
        }

        if (!empty($request->catName)){
            $query->update(['category_id'=>  $request->catName]);
        }

        return redirect('admin_items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $product
     * @return RedirectResponse
     */
    public function destroy(Products $product)
    {
        if (!Auth::check() || Auth::user()->role != 'admin'){
            return redirect('/');
        }
        DB::table('products')->where('id', '=', $product->id)->delete();

        return redirect()->back()->with('flesh', 'Product Deleted Successfully');
    }
}
