<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'status',
    ];

    // public function category()
    // {
    //     return $this->belongsTo(Productcat::class,'cat_id','id');
    // }
}
