<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsLetterModel extends Model
{
    protected $table = "newsletter";
    protected $fillable = ["email"];
}
