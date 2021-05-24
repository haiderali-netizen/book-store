<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PDFTotalPriceModel extends Model
{
    protected $table = "pdf_total_price";
    protected $fillable = ["total_price"];
}
