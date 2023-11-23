<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'cat_id',
        'img',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Productcat::class,'cat_id','id');
    }
}
