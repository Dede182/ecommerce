<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrapFour();
        View::composer(['front'], function ($view) {
            $view->with('categories',Category::latest('id')->get())
            ->with('randomProducts',Product::inRandomOrder()->limit(4)->get());
        });


            View::composer(['front'], function ($view) {
                $view->with('carts', Auth::check() ? ( Cart::where('user_id',Auth::user()->id)->first()) : '');
            }) ;




        Blade::if('cart',function($productId){

            $carts = Cart::where('user_id',Auth::user()->id)->first();
                if(!is_null($carts)){
                    $products = [];
                    foreach($carts->cartproducts as $key=>$cart){
                        $products[$key] = $cart->product_id;

                    }
                    return in_array($productId,$products);
                }

        });

        Blade::if('admin',function(){
            return Auth::user()->role === "admin";
        });
    }
}
