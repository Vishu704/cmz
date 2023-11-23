<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informationalpage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'page_title',
        'page_slug',
        'page_description',
        'status',
    ];
}
