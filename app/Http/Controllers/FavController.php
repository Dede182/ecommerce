<?php

namespace App\Http\Controllers;

use App\Models\Fav;
use App\Http\Requests\StoreFavRequest;
use App\Http\Requests\UpdateFavRequest;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFavRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function show(Fav $fav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function edit(Fav $fav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavRequest  $request
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavRequest $request, Fav $fav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fav $fav)
    {
        //
    }
}
