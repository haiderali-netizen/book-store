<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfOrder extends Model
{
    use HasFactory;


    protected $fillable = [
        'orderby',
        'file',
        'pages',
        'size',
        'color',
        'qty',
    ];
}
