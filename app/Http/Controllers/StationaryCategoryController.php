<?php

namespace App\Http\Controllers;

use App\Models\StationaryCategory;
use Illuminate\Http\Request;

class StationaryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stationary.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stationary.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StationaryCategory  $stationaryCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StationaryCategory $stationaryCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StationaryCategory  $stationaryCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StationaryCategory $stationaryCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StationaryCategory  $stationaryCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StationaryCategory $stationaryCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationaryCategory  $stationaryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationaryCategory $stationaryCategory)
    {
        //
    }
}
