<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth','verified')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('/category',CategoryController::class);
    Route::resource('/product',ProductController::class);
    Route::delete('/productImage',[productImageController::class,'destroy'])->name('productImage.destroy');
    Route::post('/review',[ReviewController::class,'store'])->name('review.store');
});

Route::get('/front',[FrontController::class,'index'])->name('front');
Route::get('/front/products',[FrontController::class,'products'])->name('front.products');
Route::get('/front/product/{id}',[FrontController::class,'show'])->name('front.product.show');
require __DIR__.'/auth.php';
