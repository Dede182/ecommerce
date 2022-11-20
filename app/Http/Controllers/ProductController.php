<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductImage;
use Illuminate\Http\Request;

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
        ->with('category','productImages')
        ->paginate(10)
        ->withQueryString();
        // return $products;
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
        $product->folder = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->user_id = Auth::user()->id;
        Storage::makeDirectory('public/'.Auth::user()->name);
        Storage::makeDirectory('public/'.Auth::user()->name.'/'.$request->title);
        if($request->hasFile('featured_image')){
            $newName = "featured_image.".uniqid().'.'.$request->file('featured_image')->extension();
            $storagePath = 'public/'.Auth::user()->name.'/'.$request->title.'/featured';
            Storage::makeDirectory($storagePath);
            $request->file('featured_image')->storeAs($storagePath.'/',$newName);
            $product->featuredImage = $newName;
        }
        $product->save();
        if($request->hasFile('productImages')){
            $productImageCollection = [];
            foreach($request->productImages as $key=>$productImage){

                $newName = "productImage.".uniqid().'.'.$productImage->extension();
                $storagePath = 'public/'.Auth::user()->name.'/'.$request->title.'/main';
                Storage::makeDirectory($storagePath);
                $productImage->storeAs($storagePath.'/',$newName);

                $productImageCollection[$key] = [
                    'productImage' => $newName,
                    'product_id' => $product->id,
                ];
            }
            // return $productImageCollection;
            ProductImage::insert($productImageCollection);
        }

        return redirect()->route('product.index')->with('status','Product was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::where('id',"$request->product")
        ->with('category','productImages')
        ->first();
        // return $product;
        return view('product.show',compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $product = Product::where('id',"$request->product")
        ->with('category','productImages')
        ->first();
        $categories = Category::latest('id')->get();
        // return $product;
        return view('product.edit',compact(['product','categories']));
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

        $product = Product::where('id',$product->id)->first();
        // return $product;
        // return $request;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->discount = $request->discount;
        $product->user_id = Auth::user()->id;
        Storage::makeDirectory('public/'.Auth::user()->name);
        Storage::makeDirectory('public/'.Auth::user()->name.'/'.$product->folder);
        if($request->hasFile('featured_image')){
            $newName = "featured_image.".uniqid().'.'.$request->file('featured_image')->extension();
            $storagePath = 'public/'.Auth::user()->name.'/'.$product->folder.'/featured';
            Storage::makeDirectory($storagePath);
            $request->file('featured_image')->storeAs($storagePath.'/',$newName);
            $product->featuredImage = $newName;
        }
        $product->update();
        if($request->hasFile('productImages')){
            $productImageCollection = [];
            foreach($request->productImages as $key=>$productImage){

                $newName = "productImage.".uniqid().'.'.$productImage->extension();
                $storagePath = 'public/'.Auth::user()->name.'/'.$product->folder.'/main';
                Storage::makeDirectory($storagePath);
                $productImage->storeAs($storagePath.'/',$newName);

                $productImageCollection[$key] = [
                    'productImage' => $newName,
                    'product_id' => $product->id,
                ];
            }
            // return $productImageCollection;
            ProductImage::insert($productImageCollection);
        }

        return redirect()->route('product.index')->with('status','Product was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $productName =$product->title;

        if(isset($product->featuredImage)){
            Storage::deleteDirectory('public/'.Auth::user()->name.'/'.$product->folder);
        }
        $product->delete();
        return redirect()->route('product.index')->with('status',$productName . ' was removed');
    }
}
