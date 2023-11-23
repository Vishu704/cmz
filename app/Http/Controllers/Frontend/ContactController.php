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

class ContactController extends Controller
{
    public function index(){
        // START HEADER & FOOTER Content
        $data['page_title'] = "Contact Us";
        $products = Productcat::where('status','active')->get();
        $data['products'] = $products;
        $user = User::select('phone', 'email', 'address')->find('2');
        $data['user'] = $user;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        return view('frontend.contact')->with($data); 
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
}