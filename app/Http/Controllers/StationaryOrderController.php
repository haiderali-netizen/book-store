<?php

namespace App\Http\Controllers;

use App\Models\StationaryOrder;
use Illuminate\Http\Request;

class StationaryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stationary.order.index');
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
     * @param  \App\Models\StationaryOrder  $stationaryOrder
     * @return \Illuminate\Http\Response
     */
    public function show(StationaryOrder $stationaryOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StationaryOrder  $stationaryOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(StationaryOrder $stationaryOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StationaryOrder  $stationaryOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StationaryOrder $stationaryOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationaryOrder  $stationaryOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationaryOrder $stationaryOrder)
    {
        //
    }
}
