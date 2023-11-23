<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Informationalpage;
use App\Models\Productcat;
use App\Models\Sellprodcat;
use App\Models\User;

class PagesController extends Controller
{
    public function privacy(Request $request){
        // START HEADER & FOOTER Content
        $data['page_title'] = "Privacy Policy";
        $products = Productcat::where('status','active')->get();
        $data['products'] = $products;
        $user = User::select('phone', 'email', 'address')->find('2');
        $data['user'] = $user;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        $Page = Informationalpage::where('page_slug',"privacy-policy")->first();
        $data['Page'] = $Page;
        return view('frontend.pages')->with($data);
    }

    public function terms(Request $request){
        // START HEADER & FOOTER Content
        $data['page_title'] = "Terms & Conditions";
        $products = Productcat::where('status','active')->get();
        $data['products'] = $products;
        $user = User::select('phone', 'email', 'address')->find('2');
        $data['user'] = $user;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $Page = Informationalpage::where('page_slug',"terms-and-conditions")->first();
        $data['Page'] = $Page;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        return view('frontend.pages')->with($data);  
        
    }
    
}