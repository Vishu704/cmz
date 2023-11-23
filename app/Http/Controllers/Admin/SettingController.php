<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class SettingController extends Controller
{
    public function index(){
        $data['page_title'] = "Admin Settings";
        $data['user'] = Auth::user();
        return view('admin.setting')->with($data);
    }

    public function updateUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        
        $cuser = Auth::user();
        $user = User::find($cuser->id);
        //On left field name in DB and on right field name in Form/view
        if($user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        if($request->input('password')!=''){
        $user->password = Hash::make($request->input('password'));
        }
        $user->save();
            return redirect()->back()->with('message', 'User Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'User Not Updated!'); 
        }
    }
}
