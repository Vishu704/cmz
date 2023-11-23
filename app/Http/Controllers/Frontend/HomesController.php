<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use App\Models\User;
use App\Models\Customerenquiry;
// use App\Models\Productcat;
// use App\Models\Sellprodcat;
// use App\Models\Informationalpage;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Helper;
// use App\Models\Service;

class HomesController extends Controller
{
    public function index(){
        $data = getHeaderMenu();
        $data['page_title'] = "Computer Mobile Zone";
        // $user = User::select('phone', 'email', 'address')->find('2');
        // $data['user'] = $user;
        // $products = Productcat::where('status','active')->get();
        // $data['products'] = $products;
        // $sellprodcat = Sellprodcat::where('status','active')->get();
        // $data['sellprodcat'] = $sellprodcat;
        // $serv = Service::where('status','active')->get();
        // $data['serv'] = $serv;
        // $pages = Informationalpage::where('page_slug','homeabout')->where('status','active')->first();
        // $data['pages'] = $pages;
        $slide = Slider::where('type','Home Page About-us Image')->where('status','active')->get();
        $data['slide'] = $slide;
        $brand = Slider::where('type','Brand Slider')->where('status','active')->get();
        $data['brand'] = $brand;
        $mainslider = Slider::where('type','Main Slider')->where('status','active')->get();
        $data['mainslider'] = $mainslider;
        $testimonials = Testimonial::where('status','active')->get();
        $data['testimonials'] = $testimonials;
        
        return view('frontend.index')->with($data); 
    }
    
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $customer = new Customerenquiry;
        $customer->name = $request['name'];
        $customer->phone = $request['phone'];
        $customer->message =$request['message'];
        $customer->save();
        return redirect()->back()->with('message', 'Form Submit Successfully!');
    }

    public function otherMobile(){
        $data = getHeaderMenu();
        $data['page_title'] = "Mobile Service";
        // $user = User::select('phone', 'email', 'address')->find('2');
        // $data['user'] = $user;
        // $products = Productcat::where('status','active')->get();
        // $data['products'] = $products;
        // $testimonials = Testimonial::where('status','active')->get();
        // $data['testimonials'] = $testimonials;
        // $pages = Informationalpage::where('page_slug','homeabout')->where('status','active')->first();
        // $data['pages'] = $pages;
        // $sellprodcat = Sellprodcat::where('status','active')->get();
        // $data['sellprodcat'] = $sellprodcat;
        return view('frontend.othermobile')->with($data); 
    }

    public function otherLaptop(){
        $data = getHeaderMenu();
        $data['page_title'] = "Laptop Service";
        // $user = User::select('phone', 'email', 'address')->find('2');
        // $data['user'] = $user;
        // $products = Productcat::where('status','active')->get();
        // $data['products'] = $products;
        // $testimonials = Testimonial::where('status','active')->get();
        // $data['testimonials'] = $testimonials;
        // $pages = Informationalpage::where('page_slug','homeabout')->where('status','active')->first();
        // $data['pages'] = $pages;
        // $sellprodcat = Sellprodcat::where('status','active')->get();
        // $data['sellprodcat'] = $sellprodcat;
        return view('frontend.otherlaptop')->with($data); 
    }
}