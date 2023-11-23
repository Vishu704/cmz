<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productissue;
use App\Models\Productcat;
use Illuminate\Support\Str;

class ProductissueController extends Controller
{
    //
    public function index(Request $request){ 
        $data['page_title'] = "Product Issue List";
        if(isset($request->search_key)){
            $search_key = $request->search_key;
		    $search_key = implode('%',str_split($search_key));
        }
        $cases_query = Productissue::with('category');

        // Search for a user based on their name.
        if (isset($request->search_key)) {
            $cases_query->where(static function ($query) use ($search_key){
                $query->where('isuue_name', 'like', "%{$search_key}%");
            });
        }
        $Products = $cases_query->orderBy("id",'desc')->paginate(20);
        $data['search_key'] = $request->search_key;
        $data['products'] = $Products;
        return view('admin.productissue.list')->with($data);
    }

    public function addProductIssue(){ 
        $data['page_title'] = "Add Product";
        $product_cats = Productcat::where('status','active')->get();
        $data['product_cats'] = $product_cats;
        return view('admin.productissue.add')->with($data);
    }

    public function saveProductIssue(Request $request){ 
        $validated = $request->validate([
            'isuue_name' => 'required',
            'issue_slug' => 'required',
            'product_cat' => 'required',
            'status' => 'required',
        ]);
         $Product = new Productissue();
        //On left field name in DB and on right field name in Form/view
        $Product->isuue_name = $request->input('isuue_name');
        $Product->issue_slug = $request->input('issue_slug');
        $Product->product_cat = $request->input('product_cat');
        if($request->input('image')!=''){
            $Product->image = $request->input('image');
        }
        $Product->status = $request->input('status');
        $Product->save();
        return redirect()->back()->with('message', 'Product added Successfully!');
    }

    public function editProductIssue(Request $request){ 
        $data['page_title'] = "Edit Product Issue";
        $product_cats = Productcat::where('status','active')->get();
        $data['product_cats'] = $product_cats;
        $product_detail = Productissue::where('id',$request->id)->first();
        $data['product_detail'] = $product_detail;
        return view('admin.productissue.edit')->with($data);
    }

    public function updateProductIssue(Request $request){
        $validated = $request->validate([
            'isuue_name' => 'required',
            'issue_slug' => 'required',
            'status' => 'required',
        ]);

        $Product = Productissue::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($Product) {
        $Product->isuue_name = $request->input('isuue_name');
        $Product->issue_slug = $request->input('issue_slug');
        $Product->product_cat = $request->input('product_cat');
        if($request->input('image')!=''){
            $Product->image = $request->input('image');
        }
        $Product->status = $request->input('status');
        $Product->save(); 
            return redirect()->back()->with('message', 'Product Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Product Not Updated!'); 
        }

    }

    public function deleteProductIssue(Request $request){
        Productissue::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Product deleted Successfully!');

    }

}