<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Customerenquiry;
use App\Models\Productcat;
use App\Models\Sellprodcat;
use App\Models\Informationalpage;
class AboutController extends Controller
{
    public function index(){
        // START HEADER & FOOTER Content
        $data = getHeaderMenu();
        $data['page_title'] = "About Us";
        // $products = Productcat::where('status','active')->get();
        // $data['products'] = $products;
        // $user = User::select('phone', 'email', 'address')->find('2');
        // $data['user'] = $user;
        // $pages = Informationalpage::where('page_slug','homeabout')->first();
        // $data['pages'] = $pages;
        // $sellprodcat = Sellprodcat::where('status','active')->get();
        // $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        $about1 = Informationalpage::where('page_slug','about1')->where('status','active')->first();
        $data['about1'] = $about1;
        $about2 = Informationalpage::where('page_slug','about2')->where('status','active')->first();
        $data['about2'] = $about2;
        $about3 = Informationalpage::where('page_slug','about3')->where('status','active')->first();
        $data['about3'] = $about3;

        return view('frontend.about')->with($data); 
    }
    
}