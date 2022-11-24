<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

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

        // return $request;
        $products = Product::
        search()
        ->when(request('category'),function($q){
            $search = request('category');

            $category = Category::where('title','like',"%$search%")->first();
            $category = $category->id;
            $q->where('category_id' ,'=',"$category");
        })
        ->when(request('discount'),function($q){

            $discount = request('discount');
            switch($discount){
                case '5%':
                    $q->where('discount','>','5');
                    break;
            case '10%':
                $q->where('discount','>','10');
                break;
            case '20%':
                $q->where('discount','>','20');
                break;
            case '30%':
                $q->where('discount','>','30');
                break;
            case '40%':
                $q->where('discount','>','40');
                // return "here";
                break;
            };
        })
        ->when(request('pricing'),function($q){

            $price = request('pricing');
            switch($price){
                case '$500':
                    $q->where('price','<','500');
                    break;
            case '$500 & $1000':
                $q->whereBetween('price',[500,1000]);
                break;
            case '$1000 & $2000':
                $q->whereBetween('price',[1000,2000]);
                break;
            case '$2000':
                $q->where('price','>=','2000');
                break;

            };
        })
        ->when(request('sort'),function($q){
            $sort = request('sort');
            switch($sort){
                case 'LTH':
                    $q->orderBy('price','asc');
                    break;
            case 'HTL':
                $q->orderBy('price','desc');
                break;
            };
        })
        ->latest('id')
        ->with('reviews')
        ->paginate(9)->withQueryString();

        // return $products;


        // return ProductResource::collection($products);

        $five = Product::where('discount','>','5')->get();
        $ten = Product::where('discount','>','10')->get();
        $twenty = Product::where('discount','>','20')->get();
        $thirty = Product::where('discount','>','30')->get();
        $fourty = Product::where('discount','>','40')->get();
        $Discount = [
             count($five),
            count($ten),
            count($twenty),
            count($thirty),
            count($fourty)
        ];
        // return $Discount;
        return view('front.products.allproduct',compact('categories','products','Discount'));
    }

    public function san(Request $request){
        // return $request;

        // $avgStar =  App\Helpers\MbCalculate::review($product->id);
        $products = Product::
            search()
            ->when(request('category'),function($q){
                $search = request('category');

                $category = Category::where('title','like',"%$search%")->first();
                $category = $category->id;
                $q->orWhere('category_id' ,'=',"$category");
            })
            ->with('reviews')
            ->get();

            $pro="";
        if(request('discount')){
            $discount = request('discount')[0];
            switch($discount){
            case '10%':
                return $pro = $products->where('discount','>','10');
                break;
            case '20%':
                return $pro = $products->where('discount','>','20');
                break;
            case '30%':
                return $pro = $products->where('discount','>','30');
                break;
            case '40%':
                return $pro = $products->where('discount','>','40');
                break;
            }


        };
        // return $pro;


        $products = ProductResource::collection($products);


        return $products;
    }
}
