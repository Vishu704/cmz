<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productissue extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_cat',
        'isuue_name',
        'issue_slug',
        'image',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Productcat::class,'product_cat','id');
    }

}