<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Productcat;
use App\Models\Sellprodcat;
use App\Models\Informationalpage;
use App\Models\Service;
use App\Models\Slider;

class ServicedetailsController extends Controller
{

    public function index(Request $request){
        // START HEADER & FOOTER Content
        $data['page_title'] = "Computer Mobile Zone";
        $products = Productcat::where('status','active')->get();
        $data['products'] = $products;
        // $serv = Service::where('status','active')->get();
        // $data['serv'] = $serv;
        $user = User::select('phone', 'email', 'address')->find('2');
        $data['user'] = $user;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $policy = Informationalpage::where('page_slug','privacy-policy')->where('status','active')->first();
        $data['policy'] = $policy;
        $termsconditions = Informationalpage::where('page_slug','terms-and-conditions')->where('status','active')->first();
        $data['termsconditions'] = $termsconditions;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        $service_slider = Slider::where('type','Service Slider')->where('status','active')->get();
        $data['service_slider'] = $service_slider;

        if($request->slug){
            $Service_details = Service::where('slug',$request->slug)->first();
        } else {
            $Service_details = Service::first();
        }

        $services = Service::where('status','active')->select('name','slug')->get();
        $data['services'] = $services;
        $data['Service_details'] = $Service_details;
        return view('frontend.service')->with($data);

    }

}