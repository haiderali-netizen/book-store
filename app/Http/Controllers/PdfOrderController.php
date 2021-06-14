<?php

namespace App\Http\Controllers;

use App\Models\PdfOrder;
use App\Models\PDFTotalPriceModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PdfOrderController extends Controller
{

    public function index(): View
    {
        return view('admin.pdforder.index', [
            'price' => PDFTotalPriceModel::orderBy('id', 'asc')->first(),
            'data'  => PdfOrder::orderBy('id', 'DESC')->get()
        ]);
    }


    public function create(): View
    {
        return view('web.pages.pdforder.index');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'mimes:pdf,docx'],
            'pages' => ['required'],
            'size'  => ['required'],
            'color' => ['required'],
            'qty'   => ['required'],
        ]);

        PdfOrder::Create([
            'file' => $this->fileUpload('pdf-orders/', $request->file('file')),
            'pages' => $request->pages,
            'size'  => $request->size,
            'color' => $request->color,
            'qty'   => $request->qty
        ]);

        return back()
            ->with('message', 'Pdf order placed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PdfOrder  $pdfOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PdfOrder $pdfOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PdfOrder  $pdfOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PdfOrder $pdfOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PdfOrder  $pdfOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PdfOrder $pdfOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PdfOrder  $pdfOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PdfOrder $pdfOrder)
    {
        //
    }
}
