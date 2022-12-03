<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FavController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productImageController;
use App\Http\Controllers\ReviewController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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



Route::middleware('auth','verified')->group(function(){
    Route::delete('/productImage',[productImageController::class,'destroy'])->name('productImage.destroy');
    Route::post('/review',[ReviewController::class,'store'])->name('review.store');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::get('cart/{id}',[CartController::class,'removeFromCart'])->name('cart.remove');
    Route::get('cart/add/{id}',[CartController::class,'addToCart'])->name('cart.add');
    Route::get('/cart/store',[CartController::class,'store'])->name('cart.store');
    Route::get('/wishlist',[FavController::class,'index'])->name('wishlist.index');
    Route::get('/wishlist/add/{id}',[FavController::class,'addToWish'])->name('wishlist.add');
    Route::get('/wishlist/remove/{id}',[FavController::class,'removeFromWish'])->name('wishlist.remove');
    Route::get('/order/{id}',[OrderController::class,'index'])->name('order.index');
    Route::post('/order/store',[OrderController::class,'store'])->name('order.store');
    Route::put('/order/{order}',[OrderController::class,'update'])->name('order.update');
    Route::get('/orders',[OrderController::class,'history'])->name('order.history');
});

Route::middleware('auth','isAdmin')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/category',CategoryController::class);
    Route::resource('/product',ProductController::class);

});

Route::get('/',[FrontController::class,'index'])->name('front');
Route::get('/front/products',[FrontController::class,'products'])->name('front.products');
Route::get('/front/san',[FrontController::class,'san'])->name('front.san');
Route::get('/front/product/{id}',[FrontController::class,'show'])->name('front.product.show');
require __DIR__.'/auth.php';
