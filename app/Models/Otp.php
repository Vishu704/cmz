<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'otp',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
