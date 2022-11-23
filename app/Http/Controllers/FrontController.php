<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){

        $categories = Category::latest('id')->get();
        $products = Product::latest('id')->limit(8)->get();

        return view('front.index',compact('categories','products'));
    }
    public function show(Request $request){

        $product =  Product::where('id',"$request->id")
        ->with('category','productImages','reviews')
        ->first();
        $latestProduct =Product::latest('id')->limit(4)->get();
        return view('front.show',compact('product','latestProduct'));
    }

    public function products(Request $request){
        $categories = Category::latest('id')->with('products')->get();
        if($request('category')){
            return $request;
        }
        $products = Product::
        search()
        ->category()
        ->latest('id')
        ->paginate(9)
        ->withQueryString()
        ;


        $fiveDiscount = Product::whereBetween('discount',[0,5])->get();
        $tenDiscount = Product::whereBetween('discount',[5,10])->get();
        $fifteenDiscount = Product::whereBetween('discount',[10,15])->get();
        $twentyFiveDiscount = Product::whereBetween('discount',[15,25])->get();
        $lastDiscount = Product::where('discount','>=',25)->get();
        $Discount = [
             count($fiveDiscount),
            count($tenDiscount),
            count($fifteenDiscount),
            count($twentyFiveDiscount),
            count($lastDiscount)
        ];
        // return $Discount;
        return view('front.products.allproduct',compact('categories','products','Discount'));
    }
}
