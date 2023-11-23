<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    //
    public function index(){
        $data['page_title'] = "Testimonial List";
        $testimonials = Testimonial::all();
        $data['testimonials'] = $testimonials;
        return view('admin.testimonials.list')->with($data);
    }

    public function addTestimonial(){ 
        $data['page_title'] = "Add Testimonial";
        return view('admin.testimonials.add')->with($data);
    }

    public function saveTestimonial(Request $request){ 
        $validated = $request->validate([
            'customer_name' => 'required',
            'testimonial' => 'required',
        ]);
         $Customer = new Testimonial();
        //On left field name in DB and on right field name in Form/view
        $Customer->customer_name = $request->input('customer_name');
        $Customer->image = $request->input('image');
        $Customer->testimonial = $request->input('testimonial');
        $Customer->status = $request->input('status');
        $Customer->save();
        return redirect()->back()->with('message', 'Testimonial added Successfully!');
    }

    public function editTestimonial(Request $request){ 
        $data['page_title'] = "Edit Testimonial";
        $testimonial_detail = Testimonial::where('id',$request->id)->first();
        $data['testimonial_detail'] = $testimonial_detail;
        return view('admin.testimonials.edit')->with($data);
    }

    public function updateTestimonial(Request $request){
        $validated = $request->validate([
            'customer_name' => 'required',
            'testimonial' => 'required',
            'status' => 'required',
        ]);

        $testimonials = Testimonial::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($testimonials) {
        $testimonials->customer_name = $request->input('customer_name');
        $testimonials->image = $request->input('image');
        $testimonials->testimonial = $request->input('testimonial');
        $testimonials->status = $request->input('status');
        $testimonials->save(); 
        return redirect()->back()->with('message', 'Testimonial Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Testimonial Not Updated!'); 
        }
    }

    public function deleteTestimonial(Request $request){
        Testimonial::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Testimonial deleted Successfully!');
    }
}
