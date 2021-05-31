<?php

namespace App\Http\Controllers;

use App\Models\GiftCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GiftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gift.category.index', [
            'categories' => GiftCategory::orderBy('id', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift.category.create');
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
            'name' => ['required', 'unique:gift_categories,name']
        ]);

        GiftCategory::Create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return back()
            ->with(['message' => 'Gift Category added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GiftCategory  $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function show(GiftCategory $giftCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GiftCategory  $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(GiftCategory $giftCategory)
    {
        return view('admin.gift.category.edit', [
            'category' => $giftCategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GiftCategory  $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GiftCategory $giftCategory)
    {
        $request->validate([
            'name' => ['required', 'unique:gift_categories,name,' . $giftCategory->id]
        ]);

        $giftCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return back()
            ->with(['message' => 'Gift category updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GiftCategory  $giftCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giftCategory = GiftCategory::find($id);
        $giftCategory->delete();
        return back()
            ->with(['message' => 'Gift category removed successfully']);
    }
}
