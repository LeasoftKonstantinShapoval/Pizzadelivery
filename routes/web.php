<?php

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductsController::class, 'index'])->name('index');

Route::get('/about_us', function (){
    return view('about');
})->name('about_us');
Route::get('/delivery', function (){
    return view('delivery');
})->name('delivery');

Route::get('/createOrder', [OrdersController::class, 'store'])->name('createOrder');
Route::post('/submitOrder', [OrdersController::class, 'create'])->name('submitOrder');
Route::get('/show/{id}', [OrdersController::class, 'show'])->name('showUserOrder');


Auth::routes([
    //Admin

    //Products
    Route::get('/admin_items', [ProductsController::class, 'adminProducts'])->name('admin_panel'),
    Route::get('/createProduct', [ProductsController::class, 'store'])->name('createProduct'),
    Route::post('/createProduct', [ProductsController::class, 'create'])->name('createProduct'),
    Route::get('/editProduct/{id}', [ProductsController::class, 'edit'])->name('editProduct'),
    Route::post('/editProduct/{id}', [ProductsController::class, 'update'])->name('editProduct'),
    Route::post('/deleteProduct/{product}', [ProductsController::class, 'destroy'])->name('deleteProduct'),

    //Orders
    Route::get('/admin_orders', [OrdersController::class, 'index'])->name('admin_orders'),
    Route::post('/editOrder/{order}', [OrdersController::class, 'update'])->name('editOrder'),

    //Users
    Route::get('/admin_users', [UserController::class, 'index'])->name('admin_users'),


    //User
    Route::get('/profile', [UserController::class, 'show'])->name('profile'),
    Route::get('/profile/showUserOrders/{user_id}', [OrdersController::class, 'showUserOrders'])->name('showUserOrders'),

    Route::post('/profile/update/{id}', [UserController::class, 'update'])->name('update'),
    Route::post('/profile/passwordChange/{id}', [UserController::class, 'passwordChange'])->name('passwordChange'),
]);
