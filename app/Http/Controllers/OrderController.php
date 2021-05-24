<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderModel;
use App\Models\AddToCartModel;
use App\Models\OrderProductsModel;
use App\Models\PDFOrderModel;
use App\Models\PDFTotalPriceModel;

class OrderController extends Controller
{
    public function saveOrder(Request $request){
        if($request->session()->has("onlineClient")){
            $onlineClientData = $request->session()->get("onlineClient");
            $newOrder = new OrderModel;
            $newOrder->userId = $onlineClientData->id;
            $newOrder->totalPrice = $request->grandPrice;
            $newOrder->save();
            $productData = AddToCartModel::where('userId',$onlineClientData->id)->get();
            foreach ($productData as $product) {
                $newOrderProducts = new OrderProductsModel;
                $newOrderProducts->productId = $product->productId;
                $newOrderProducts->quantity = $product->quantity;
                $newOrderProducts->orderId = $newOrder->id;
                $newOrderProducts->save();
            }
            foreach ($productData as $product) {
                $product->delete();
            }
            return redirect('/')->with("success","Your Order Save Successfully.");
        }else{
            return redirect('/login')->with("danger","Please! Login first to Order.");
        }
    }
    public function Order(Request $request){
        if($request->session()->has("onlineClient")){
            $clientInfo =  $request->session()->get("onlineClient");
            $totalData = OrderModel::where('userId',$clientInfo->id)->get();
            return view('web.order.index',compact("totalData"));
        }else{
            return redirect('/');
        }
    }
    public function OrderPreview(Request $request,$id){
        $data = OrderModel::find($id);
        $totalData = OrderProductsModel::where('orderId',$data->id)->get();
        return view('web.order.detailOrder',compact("totalData"));
    }

    // Pdf Order
    
    public function PDFOrder(Request $request){
        $totalPricePerPage = PDFTotalPriceModel::orderBy('id','asc')->first();
        return view('web.order.pdf_order',compact("totalPricePerPage"));
    }
    public function PDFOrderProcess(Request $request){
        $totalPricePerPage = PDFTotalPriceModel::orderBy('id','asc')->first();
        $data = $request->all();
        if ($request->file("pdfFile") != null) {
            $path = $request->file("pdfFile")->store("PDF_Order");
            $data["file"] = $path;
        }
        $data["total"] = $request->pages * $totalPricePerPage->total_price;
        $pdf = new PDFOrderModel;
        $pdf->fill($data);
        $pdf->save();
        return back()->with("success","Your PDF Order Save Successfully.");
    }

    // Admin Panel
    public function PDFOrderView(Request $request){
        $totalData = PDFOrderModel::all();
        $totalPricePerPage = PDFTotalPriceModel::orderBy('id','asc')->first();
        return view('admin.order.pdf',compact("totalData","totalPricePerPage"));
    }
    public function PDFPerPageProcess(Request $request){
        $totalPricePerPage = PDFTotalPriceModel::orderBy('id','asc')->first();
        $totalPricePerPage->total_price = $request->total_price;
        $totalPricePerPage->save();
        return back()->with('success','Price Updated Successfully.');
    }
    public function View(Request $request){
        $totalData = OrderModel::all();
        return view('admin.order.index',compact("totalData"));
    }
    public function OrderCompleted(Request $request,$id){
        $data = OrderModel::find($id);
        $data->status = 1;
        $data->save();
        return back()->with('success','This order has been completed.');
    }
    public function OrderDetail(Request $request,$id){
        $data = OrderModel::find($id);
        $totalData = OrderProductsModel::where('orderId',$data->id)->get();
        return view('admin.order.detailOrder',compact("totalData"));
    }
}
