<?php 
use App\Models\Productcat;
use App\Models\Sellprodcat;
use App\Models\Informationalpage;
use App\Models\User;


function getHeaderMenu()
{
    $products = Productcat::where('status','active')->get();
    $data['products'] = $products;
    $user = User::select('phone', 'email', 'address')->find('2');
    $data['user'] = $user;
    $pages = Informationalpage::where('page_slug','homeabout')->first();
    $data['pages'] = $pages;
    $sellprodcat = Sellprodcat::where('status','active')->get();
    $data['sellprodcat'] = $sellprodcat;
    return $data;
}