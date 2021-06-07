<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Gift;
use App\Models\GiftCategory;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    public function all_gifts()
    {
        return view('web.pages.gift.index', [
            'gifts' => Gift::orderBy('title', 'ASC')->paginate(12),
            'categories' => GiftCategory::withCount('gifts')->orderBy('name', 'ASC')->get()
        ]);
    }

    public function gift($category)
    {
        $categoryId = GiftCategory::where('slug', $category)->first();
        return view('web.pages.gift.index', [
            'gifts' => Gift::with('category')->where('gift_category_id', $categoryId->id)->orderBy('id', 'desc')->paginate(12),
            'categories'  => GiftCategory::withCount('gifts')->get(),
        ]);
    }
}
