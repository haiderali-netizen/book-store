<?php

use App\Http\Controllers\ApiController;
use App\Models\BookModel;
use App\Models\Gift;
use App\Models\GiftCategory;
use App\Models\Stationary;
use App\Models\StationaryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('books', function (Request $request) {
    return response()->json(BookModel::all());
});



Route::get('stationary', function (Request $request) {
    return response()->json(Stationary::all());
});

Route::get('stationary-category', function (Request $request) {
    return response()->json(StationaryCategory::all());
});

Route::get('gift', function (Request $request) {
    return response()->json(Gift::all());
});

Route::get('gift-category', function (Request $request) {
    return response()->json(GiftCategory::all());
});


Route::get("allNews", [ApiController::class, "AllNews"]);
Route::get("allCartData/{id}", [ApiController::class, "allCartData"]);
Route::get("allFaqData", [ApiController::class, "AllFaqData"]);
