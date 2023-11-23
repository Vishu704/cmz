<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sellproduct;
use App\Models\Sellprodcat;
use Illuminate\Support\Str;

class SellroductController extends Controller
{
    //
    public function index(Request $request){ 
        $data['page_title'] = "Sell Product List";

        if(isset($request->search_key)){
            $search_key = $request->search_key;
		    $search_key = implode('%',str_split($search_key));
        }

        $cases_query = Sellproduct::with('sellcategory');

        // Search for a user based on their name.
        if (isset($request->search_key)) {
            $cases_query->where(static function ($query) use ($search_key){
                $query->where('name', 'like', "%{$search_key}%");
            });
        }
        $Products = $cases_query->orderBy("id",'desc')->paginate(20);
        $data['search_key'] = $request->search_key;
        $data['products'] = $Products;
        return view('admin.sellproduct.list')->with($data);
    }

    public function addProduct(){ 
        $data['page_title'] = "Add Sell Product";
        $product_cats = Sellprodcat::where('status','active')->get();
        $data['product_cats'] = $product_cats;
        return view('admin.sellproduct.add')->with($data);
    }

    public function saveProduct(Request $request){ 
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'cat_id' => 'required',
            'status' => 'required',
        ]);
         $Product = new Sellproduct();
        //On left field name in DB and on right field name in Form/view
        $Product->name = $request->input('name');
        $Product->slug = $request->input('slug');
        $Product->cat_id = $request->input('cat_id');
        if($request->input('img')!=''){
            $Product->img = $request->input('img');
        }
        
        $Product->status = $request->input('status');
        $Product->save();
        return redirect()->back()->with('message', 'Product added Successfully!');
    }

    public function editProduct(Request $request){ 
        $data['page_title'] = "Edit Sell Product";
        $product_cats = Sellprodcat::where('status','active')->get();
        $data['product_cats'] = $product_cats;
        $product_detail = Sellproduct::where('id',$request->id)->first();
        $data['product_detail'] = $product_detail;
        return view('admin.sellproduct.edit')->with($data);
    }

    public function updateProduct(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);

        $Product = Sellproduct::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($Product) {
        $Product->name = $request->input('name');
        $Product->slug = $request->input('slug');
        $Product->cat_id = $request->input('cat_id');
        if($request->input('img')!=''){
            $Product->img = $request->input('img');
        }
        
        $Product->status = $request->input('status');
        $Product->save(); 
            return redirect()->back()->with('message', 'Product Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Product Not Updated!'); 
        }

    }

    public function deleteProduct(Request $request){
        Sellproduct::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Product deleted Successfully!');

    }

}
