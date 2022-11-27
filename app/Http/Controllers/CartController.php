<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Arr;
use App\Helpers\MbCalculate;
use App\Models\CartProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $carts = Cart::where('user_id',Auth::user()->id)->first();

        if(isset($carts->cartproducts)){
            $carts = $carts->cartproducts;

            $discount = [];
            foreach($carts as $key=>$cart){

                $discountprice =  MbCalculate::discount($cart->product->discount, $cart->product->price);
               $discount[$key] = $discountprice;
            }
            $total = array_sum($discount);
        //    return $carts;
           return view('front.cart.index',compact('carts','total'));
        }
      return view('front.cart.index',compact('carts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request){
       $carts = Cart::where('user_id',Auth::user()->id)->first();
        // return $request;
        $productId =  $request->id;
        $cartProduct = new CartProducts();
        $cartProduct->cart_id = $carts->id;
        $cartProduct->product_id = $productId;
        $cartProduct->save();
        return redirect()->back()->with('status','Added to Cart');
    }

    public function removeFromCart(Request $request){
        $cartProduct = CartProducts::findOrFail($request->id);
        $cartProduct->delete();
        return redirect()->back()->with("status",'Removed from cart');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
