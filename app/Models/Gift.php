<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'gift_category_id',
        'title',
        'image',
        'price',
        'stock',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(GiftCategory::class, 'gift_category_id');
    }
}
