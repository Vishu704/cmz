<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    //
    public function index(Request $request){ 
        $data['page_title'] = "Service List";

        if(isset($request->search_key)){
            $search_key = $request->search_key;
		    $search_key = implode('%',str_split($search_key));
        }

        // $cases_query = Product::with('category');

        // // Search for a user based on their name.
        // if (isset($request->search_key)) {
        //     $cases_query->where(static function ($query) use ($search_key){
        //         $query->where('name', 'like', "%{$search_key}%");
        //     });
        // }
        $Services = Service::paginate('20');
        $data['search_key'] = $request->search_key;
        $data['services'] = $Services;
        return view('admin.service.list')->with($data);
    }

    public function addService(){ 
        $data['page_title'] = "Add Service";
        return view('admin.service.add')->with($data);
    }

    public function saveService(Request $request){ 
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);
         $Service = new Service();
        //On left field name in DB and on right field name in Form/view
        $Service->name = $request->input('name');
        $Service->slug = $request->input('slug');
        $Service->description = $request->input('description');
        $Service->status = $request->input('status');
        $Service->save();
        return redirect()->back()->with('message', 'Service added Successfully!');
    }

    public function editService(Request $request){ 
        $data['page_title'] = "Edit Service";
        $service_detail = Service::where('id',$request->id)->first();
        $data['service_detail'] = $service_detail;
        return view('admin.service.edit')->with($data);
    }

    public function updateService(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);

        $Service = Service::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($Service) {
        $Service->name = $request->input('name');
        $Service->slug = $request->input('slug');
        $Service->description = $request->input('description');
        $Service->status = $request->input('status');
        $Service->save(); 
            return redirect()->back()->with('message', 'Service Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Service Not Updated!'); 
        }

    }

    public function deleteService(Request $request){
        Service::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Service deleted Successfully!');

    }

}
