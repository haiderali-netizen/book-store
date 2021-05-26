<?php

namespace App\Http\Controllers;

use App\Models\Stationary;
use App\Models\StationaryCategory;
use Illuminate\Http\Request;

class StationaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.stationary.index', [
            'stationries' => Stationary::with('category')->orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stationary.create', [
            'categories' => StationaryCategory::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'numeric'],
            'category' => ['required', 'exists:stationary_categories,id'],
            'image'    => ['required', 'image'],
            'short_description' => ['required'],
            'description' => ['required'],
        ]);
        Stationary::create([
            'name' => $request->name,
            'price' => $request->price,
            'stock' =>  $request->stock,
            'stationary_category_id' =>  $request->category,
            'image'    =>  $this->fileUpload('images/', $request->file('image')),
            'short_description' =>  $request->short_description,
            'description' =>  $request->description,
        ]);
        return back()->with('message', 'Stationary added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stationary  $stationary
     * @return \Illuminate\Http\Response
     */
    public function show(Stationary $stationary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stationary  $stationary
     * @return \Illuminate\Http\Response
     */
    public function edit(Stationary $stationary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stationary  $stationary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stationary $stationary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stationary  $stationary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stationary $stationary)
    {
        $stationary->delete();
        return back()->with('message', 'Stationary removed successfully');
    }
}
