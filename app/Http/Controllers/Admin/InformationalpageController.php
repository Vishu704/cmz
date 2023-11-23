<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Informationalpage;

class InformationalpageController extends Controller
{
    //
    public function index(){ 
        $data['page_title'] = "Page Information";
        $pages = Informationalpage::paginate('20');
        return view('admin.informationalpages.list',compact('pages'))->with($data);

    }

    public function addPage(){ 
        $data['page_title'] = "Add Page";
        return view('admin.informationalpages.add')->with($data);
    }

    public function savePage(Request $request){ 
        $validated = $request->validate([
            'page_title' => 'required',
            'page_slug' => 'required',
            'page_description' => 'required',
        ]);
         $Productcat = new Informationalpage();
        //On left field name in DB and on right field name in Form/view
        $Productcat->page_title = $request->input('page_title');
        $Productcat->page_slug = $request->input('page_slug');
        $Productcat->page_description = $request->input('page_description');
        $Productcat->status = $request->input('status');
        $Productcat->save();
        return redirect()->back()->with('message', 'Page added Successfully!');
    }

    public function editPage(Request $request){ 
        $data['page_title'] = "Edit Page";
        $page_detail = Informationalpage::where('id',$request->id)->first();
        $data['page_detail'] = $page_detail;
        return view('admin.informationalpages.edit')->with($data);
    }

    public function updatePage(Request $request){
        $validated = $request->validate([
            'page_title' => 'required',
            'page_slug' => 'required',
            'page_description' => 'required',
            'status' => 'required',
        ]);

        $Pages = Informationalpage::find($request->id);
        //On left field name in DB and on right field name in Form/view
        if($Pages) {
        $Pages->page_title = $request->input('page_title');
        $Pages->page_slug = $request->input('page_slug');
        $Pages->page_description = $request->input('page_description');
        $Pages->status = $request->input('status');
        $Pages->save(); 
        return redirect()->back()->with('message', 'Page Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'Page Not Updated!'); 
        }
    }

    public function deletePage(Request $request){
        Informationalpage::where('id', $request->id)->delete();
        return redirect()->back()->with('message', 'Page deleted Successfully!');
    }
}
