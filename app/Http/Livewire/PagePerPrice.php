<?php

namespace App\Http\Livewire;

use App\Models\PDFTotalPriceModel;
use Livewire\Component;

class PagePerPrice extends Component
{
    public $new_price;
    public $message;
    public function render()
    {
        return view('livewire.page-per-price', [
            'price' => PDFTotalPriceModel::orderBy('id', 'asc')->first()
        ]);
    }

    public function save()
    {
        $totalPricePerPage = PDFTotalPriceModel::orderBy('id', 'asc')->first();
        $totalPricePerPage->total_price = $this->new_price;
        $totalPricePerPage->save();
        $this->message = "Per page price updated succefully";
    }
}
