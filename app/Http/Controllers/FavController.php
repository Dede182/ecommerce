<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Models\Favitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\StoreFavRequest;
use App\Http\Requests\UpdateFavRequest;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishes = Fav::where('user_id',Auth::user()->id)->first();
        // return $wishes;
        return view('front.wish.index',compact('wishes'));
    }

   public function addToWish(Request $request){

    $fav = Fav::where('user_id',Auth::user()->id)->first();
    $productId =  $request->id;
    $favlist = new Favitem();
    $favlist->product_id = $productId;
    $favlist->fav_id = $fav->id;
    $favlist->save();
    return redirect()->back()->with('status','Added to Wishlist');
   }

   public function removeFromWish(Request $request){

    $favItem = Favitem::findOrFail($request->id);
    $favItem->delete();
    return redirect()->back()->with("status",'Removed from Wishlist');
}
}
