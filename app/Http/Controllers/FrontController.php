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
}
