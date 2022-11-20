<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::latest('id')->get();
        return view('front.index',compact('categories'));
    }
}
