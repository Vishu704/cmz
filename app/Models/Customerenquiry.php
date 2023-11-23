<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use App\Mail\ContactMail;

class Customerenquiry extends Model
{
    use HasFactory;
    // protected $table = "customerenquiries";
    // protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'name',
        'phone',
        'message',
    ];

    // public static function boot() {
  
    //     parent::boot();
  
    //     static::created(function ($item) {
                
    //         $adminEmail = "vishwajeetcse2016@gmail.com";
    //         Mail::to($adminEmail)->send(new ContactMail($item));
    //     });
    // }

}