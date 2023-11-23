<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\Informationalpage;
use App\Models\Productcat;
use App\Models\Product;
use App\Models\Sellprodcat;
use App\Models\Testimonial;

class ProductlistController extends Controller
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
        $policy = Informationalpage::where('page_slug','privacy-policy')->where('status','active')->first();
        $data['policy'] = $policy;
        $termsconditions = Informationalpage::where('page_slug','terms-and-conditions')->where('status','active')->first();
        $data['termsconditions'] = $termsconditions;
        $sellprodcat = Sellprodcat::where('status','active')->get();
        $data['sellprodcat'] = $sellprodcat;
        // END HEADER & FOOTER Content

        $testimonials = Testimonial::where('status','active')->get();
        $data['testimonials'] = $testimonials;
        
        $cat_slug = $request->cat_slug;
        if(Productcat::where('cat_slug',$cat_slug)->exists())
        {  
            $Category = Productcat::where('cat_slug',$cat_slug)->first();
            $data['Category'] = $Category;
            $product = Product::where('cat_id',$Category->id)->where('status','active')->get();
            $data['product'] = $product;
            return view('frontend.productlist')->with($data);  
        }
        else{
            return redirect()->back()->with('message', 'Product does ot exist!');
        }
    }
}