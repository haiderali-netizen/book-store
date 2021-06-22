<?php

use App\Http\Controllers\ApiController;
use App\Models\AddToCartModel;
use App\Models\BookCategoryModel;
use App\Models\BookModel;
use App\Models\BookTypeModel;
use App\Models\Gift;
use App\Models\GiftCategory;
use App\Models\PdfOrder;
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


Route::get('e-books', function (Request $request) {
    return response()->json(BookModel::orderBy('id', 'desc')->where('pending', 0)->where('typeId', 1)->get());
});

Route::get('pdf-order', function (Request $request) {
    PdfOrder::Create([
        'file' => $this->fileUpload('pdf-orders/', $request->file('file')),
        'pages' => $request->pages,
        'size'  => $request->size,
        'color' => $request->color,
        'qty'   => $request->qty
    ]);

    return response()->json([
        'status' => 200,
        'message' => 'Pdf order placed successfully'
    ]);
});


Route::get('books', function (Request $request) {
    return response()->json(BookModel::all());
});

Route::get('book-category', function (Request $request) {
    return response()->json(BookCategoryModel::all());
});


Route::get('book-types', function (Request $request) {
    return response()->json(BookTypeModel::all());
});

Route::post('add-to-cart', function (Request $request) {
    $uniqid =  $request->session()->get("uniqid");
    $idd = $uniqid;
    $cartOld = AddToCartModel::where('sessionId', $idd)->where('productId', $request->productId)->first();
    if ($cartOld == null) {
        $cartnew = new AddToCartModel();
        $cartnew->productId = $request->productId;
        $cartnew->type      = $request->productType;
        $cartnew->price     = $request->price;
        $cartnew->sessionId = $idd;
        $cartnew->save();
    } else {
        $cartOld->quantity += 1;
        $cartOld->save();
    }
    return response()->json([
        'status' => 200,
        'message' => 'Add to cart item successfully'
    ]);
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
