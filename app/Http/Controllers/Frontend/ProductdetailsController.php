<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Customerenquiry;
use App\Models\Informationalpage;
use App\Models\Productcat;
use App\Models\Product;
use App\Models\Sellprodcat;
use App\Models\Testimonial;
use App\Models\Productissue;

class ProductdetailsController extends Controller
{
    public function index(Request $request){
        // START HEADER & FOOTER Content
        $data['page_title'] = "Computer Mobile Zone";
        $products = Productcat::where('status','active')->get();
        $data['products'] = $products;
        $user = User::select('phone', 'email', 'address')->find('2');
        $data['user'] = $user;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $pages = Informationalpage::where('page_slug','homeabout')->first();
        $data['pages'] = $pages;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        $testimonials = Testimonial::where('status','active')->get();
        $data['testimonials'] = $testimonials;
        $slug = $request->slug;
        if(Product::where('slug',$slug)->exists())
        {  
            $Product = Product::where('slug',$slug)->first();
            $data['Product'] = $Product;
            $Productissue = Productissue::where('product_cat',$Product->cat_id)->where('status','active')->get();
            $data['Productissue'] = $Productissue;
            return view('frontend.productdetails')->with($data);  
        }
        else{
            return redirect()->back()->with('message', 'Product does ot exist!');
        }
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $cquery = new Customerenquiry;
        $cquery->name = $request['name'];
        $cquery->phone = $request['phone'];
        $cquery->message =$request['message'];
        $cquery->save();
        return redirect()->back()->with('message', 'Form Submit Successfully!');
    }

}