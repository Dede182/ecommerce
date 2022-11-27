<?php

namespace App\Http\Controllers;

use App\Models\Favitem;
use App\Http\Requests\StoreFavitemRequest;
use App\Http\Requests\UpdateFavitemRequest;

class FavitemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreFavitemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavitemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Favitem  $favitem
     * @return \Illuminate\Http\Response
     */
    public function show(Favitem $favitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favitem  $favitem
     * @return \Illuminate\Http\Response
     */
    public function edit(Favitem $favitem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavitemRequest  $request
     * @param  \App\Models\Favitem  $favitem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavitemRequest $request, Favitem $favitem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favitem  $favitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favitem $favitem)
    {
        //
    }
}
