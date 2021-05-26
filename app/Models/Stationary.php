<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stationary extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'price',
        'stock',
        'stationary_category_id',
        'image',
        'short_description',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(StationaryCategory::class, 'stationary_category_id');
    }
}
