<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //
    public function index(){ 
        $data['page_title'] = "Slider Images";
        $sliders = Slider::paginate('100');
        $data['sliders'] = $sliders;
        return view('admin.sliders.list')->with($data);
    }

    public function addSlider(){ 
        $data['page_title'] = "Add Slider Image";
        return view('admin.sliders.add')->with($data);
    }

    public function saveSlider(Request $request){ 
        $validated = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
         $slider = new Slider();
        //On left field name in DB and on right field name in Form/view
        $slider->title = $request->input('title');
        if($request->input('image')!=''){
            $slider->image = $request->input('image');
        }
        $slider->type = $request->input('type');
        $slider->slide_link = $request->input('slide_link');
        $slider->status = $request->input('status');
        $slider->save();
        return redirect()->back()->with('message', 'Slider Image added Successfully!');
    }

    public function editSlider(Request $request){ 
        $data['page_title'] = "Edit Slider Image";
        $slider_detail = Slider::where('id',$request->id)->first();
        $data['slider_detail'] = $slider_detail;
        return view('admin.sliders.edit')->with($data);
    }

    public function updateSlider(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'status' => 'required',
        ]);

        $slider = Slider::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($slider) {
        $slider->title = $request->input('title');
        if($request->input('image')!=''){
            $slider->image = $request->input('image');
        }
        $slider->type = $request->input('type');
        $slider->slide_link = $request->input('slide_link');
        $slider->status = $request->input('status');
        $slider->save(); 
            return redirect()->back()->with('message', 'Slider Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Slider Not Updated!'); 
        }
    }

    public function deleteSlider(Request $request){
        Slider::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Slider deleted Successfully!');
    }
}
