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
        return view('admin.stationary.category.index', [
            'categories' => StationaryCategory::orderBy('id', 'DESC')->get()
        ]);
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
        $request->validate([
            'name' => ['required', 'unique:stationary_categories,name']
        ]);
        StationaryCategory::create([
            'name' => $request->name
        ]);
        return back()->with('message', 'Category added successfully.');
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
        return view('admin.stationary.category.edit', [
            'category' => $stationaryCategory,
        ]);
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
        $request->validate([
            'name' => ['required', 'unique:stationary_categories,name,' . $stationaryCategory->id]
        ]);
        $stationaryCategory->update([
            'name' => $request->name
        ]);
        return back()->with('message', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StationaryCategory  $stationaryCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StationaryCategory $stationaryCategory)
    {
        $stationaryCategory->delete();
        return back()->with('message', 'Category removed successfully.');
    }
}
