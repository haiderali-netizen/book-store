<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use App\Models\GiftCategory;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gift.index', [
            'gifts' => Gift::with('category')
                ->orderBy('id', 'DESC')
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gift.create', [
            'categories' => GiftCategory::orderBy('name', 'ASC')->get()
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
            'title' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'category' => ['required', 'exists:gift_categories,id'],
            'image' => ['required', 'image'],
            'description' => ['required'],
        ]);


        Gift::create([
            'gift_category_id' => $request->category,
            'title' => $request->title,
            'image' => $this->fileUpload('images/', $request->File('image')),
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return back()
            ->with(['message' => 'Gift item added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function show(Gift $gift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function edit(Gift $gift)
    {
        return view('admin.gift.edit', [
            'gift' => $gift,
            'categories' => GiftCategory::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gift $gift)
    {
        $request->validate([
            'title' => ['required'],
            'price' => ['required'],
            'stock' => ['required'],
            'category' => ['required', 'exists:gift_categories,id'],
            'image' => ['nullable', 'image'],
            'description' => ['required'],
        ]);

        $gift->update([
            'gift_category_id' => $request->category,
            'title' => $request->title,
            'image' => $request->file('image') ? $this->fileUpload('images/', $request->File('image')) : $gift->image,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return back()
            ->with(['message' => 'Gift item updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gift  $gift
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gift = Gift::find($id);
        $gift->delete();
        return back()
            ->with(['message' => 'Gift item removed successfully.']);
    }
}
