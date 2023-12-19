<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('list.product');
Route::get('/product/{slug}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::post('/cart', [App\Http\Controllers\HomeController::class, 'add_to_cart'])->name('add_to_cart');
Route::delete('/cart/{id}', [App\Http\Controllers\HomeController::class, 'destroy_cart_product'])->name('destroy_cart_product');

Auth::routes();

Route::prefix('v1')->middleware('role:admin')->group(function () {


    // dashboard 
    Route::get('', [App\Http\Controllers\Backend\IndexController::class, 'index'])->name('dashboard');

    // route product
    Route::resource('product', App\Http\Controllers\Backend\ProductController::class);

    // route users
    Route::resource('users', App\Http\Controllers\Backend\ProductController::class);

    // route orders
    Route::get('orderan', [App\Http\Controllers\Backend\OrderanController::class, 'index'])->name('orderan.index');

    // route reviews
    Route::get('review', [App\Http\Controllers\Backend\ReviewController::class, 'index'])->name('review.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
