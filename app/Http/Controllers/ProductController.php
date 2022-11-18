<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::
        search()
        ->latest('id')
        ->with('category')
        ->paginate(10)
        ->withQueryString();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest('id')->get();

        return view('product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // return $request;

        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        Storage::makeDirectory('public/'.Auth::user()->name);
        Storage::makeDirectory('public/'.Auth::user()->name.'/'.$request->title);
        if($request->hasFile('featured_image')){
            $newName = "featured_image.".uniqid().'.'.$request->file('featured_image')->extension();
            $storagePath = 'public/'.Auth::user()->name.'/'.$request->title.'/'.$newName;
            Storage::makeDirectory($storagePath);
            $request->file('featured_image')->storeAs($storagePath.'/',$newName);
            $product->featuredImage = $newName;
        }

        if($request->hasFile('productImages')){
            $productImageCollection = [];
            foreach($request->productImages as $key=>$productImage){

                $newName = "productImage.".uniqid().'.'.$productImage->extension();
                $storagePath = 'public/'.Auth::user()->name.'/'.$request->title.'/';
                Storage::makeDirectory($storagePath);
                $productImage->storeAs($storagePath.'/',$newName);

                $productImageCollection[$key] = $newName;
            }
            // return $productImageCollection;
            ProductImage::insert($productImageCollection);
        }

        return $product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
