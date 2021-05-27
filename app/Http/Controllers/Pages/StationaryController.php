<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\MetaTagsModel;
use App\Models\Stationary;
use App\Models\StationaryCategory;
use Illuminate\Http\Request;

class StationaryController extends Controller
{
    public function all_stationary()
    {
        $meta = MetaTagsModel::where('name_page', 'All Books')->first();
        return view('web.pages.stationary.index', [
            'stationaries' => Stationary::with('category')->orderBy('id', 'desc')->paginate(12),
            'categories'  => StationaryCategory::withCount('stationaries')->get(),
            'meta'  => $meta
        ]);
    }
}
