<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellprodcat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cat_name',
        'cat_slug',
        'cat_img',
        'status',
    ];

    public function sellproducts()
    {
        return $this->hasMany(Sellproduct::class);
    }
}
