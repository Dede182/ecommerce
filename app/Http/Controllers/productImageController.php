<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class productImageController extends Controller
{
    public function destroy(Request $request){
        // return $request;
        $image = ProductImage::where('id',$request->id)->with('product')->first();
        // return $image;
        $storagePath = 'public/'.Auth::user()->name.'/'.$image->product->title.'/main';
        Storage::delete($storagePath.'/'.$image->productImage);
        $image->delete();

        return redirect()->back()->with('status','image was removed');
    }
}
