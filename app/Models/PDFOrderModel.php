<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PDFOrderModel extends Model
{
    protected $table = "pdf_download";
    protected $fillable = ["pages","sides","color","total","name","email","phone","comment","file"];
}
