<?php

namespace App\Http\Controllers;

use App\Models\GiftOrder;
use Illuminate\Http\Request;

class GiftOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gift.order.index');
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
     * @param  \App\Models\GiftOrder  $giftOrder
     * @return \Illuminate\Http\Response
     */
    public function show(GiftOrder $giftOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftOrder  $giftOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftOrder $giftOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftOrder  $giftOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftOrder $giftOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftOrder  $giftOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(GiftOrder $giftOrder)
    {
        //
    }
}
