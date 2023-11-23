<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'blog_title',
        'blog_slug',
        'blog_description',
        'meta_keyword',
        'meta_title',
        'meta_description',
        'image',
        'status',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Productcat::class,'product_cat','id');
    // }

}