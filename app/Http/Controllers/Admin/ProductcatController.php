<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productcat;
use Illuminate\Support\Str;

class ProductcatController extends Controller
{
    //
    public function index(){ 
        $data['page_title'] = "Product Category";
        $productcats = Productcat::paginate('100');
        $data['productcats'] = $productcats;
        return view('admin.productcat.list')->with($data);
    }

    public function addCat(){ 
        $data['page_title'] = "Add Product Category";
        return view('admin.productcat.add')->with($data);
    }

    public function saveCat(Request $request){ 
        $validated = $request->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required',
            'status' => 'required',
        ]);
         $Productcat = new Productcat();
        //On left field name in DB and on right field name in Form/view
        $Productcat->cat_name = $request->input('cat_name');
        $Productcat->cat_slug = $request->input('cat_slug');
        if($request->input('cat_img')!=''){
            $Productcat->cat_img = $request->input('cat_img');
        }
        $Productcat->status = $request->input('status');
        $Productcat->save();
        return redirect()->back()->with('message', 'Category added Successfully!');
    }

    public function editCat(Request $request){ 
        $data['page_title'] = "Edit Product Category";
        $cat_detail = Productcat::where('id',$request->cat_id)->first();
        $data['cat_detail'] = $cat_detail;
        return view('admin.productcat.edit')->with($data);
    }

    public function updateCat(Request $request){
        $validated = $request->validate([
            'cat_name' => 'required',
            'cat_slug' => 'required',
            'status' => 'required',
        ]);

        $Productcat = Productcat::find($request->cat_id);
        //On left field name in DB and on right field name in Form/view
        if($Productcat) {
        $Productcat->cat_name = $request->input('cat_name');
        $Productcat->cat_slug = $request->input('cat_slug');
        if($request->input('cat_img')!=''){
            $Productcat->cat_img = $request->input('cat_img');
        }
        $Productcat->status = $request->input('status');
        $Productcat->save(); 
            return redirect()->back()->with('message', 'Category Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Category Not Updated!'); 
        }

    }

    public function deleteCat(Request $request){
        Productcat::where('id', $request->cat_id)->delete();
        return redirect()->back()->with('message', 'Category deleted Successfully!');

    }

}
