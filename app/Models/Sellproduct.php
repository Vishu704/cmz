<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellproduct extends Model
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

    public function sellcategory()
    {
        return $this->belongsTo(Sellprodcat::class,'cat_id','id');
    }
}
