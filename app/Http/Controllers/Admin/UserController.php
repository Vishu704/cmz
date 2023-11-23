<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\userTypes;
use Spatie\Permission\Models\Role;
use Hash;

class UserController extends Controller
{
    //
    public function index(Request $request){ 
        $data['page_title'] = "Users";

        if(isset($request->search_key)){
            $search_key = $request->search_key;
            $data['search_key'] = $request->search_key;
            $users = User::where('name', 'like', "%{$search_key}%")
                        ->orderBy('name','asc')
                        ->paginate(10);
        } else {
            $data['search_key'] = '';
            $users = User::orderBy('name','asc')->paginate(10);
        }
        
        $data['users'] = $users;
        return view('admin.user.list')->with($data);
    }

    public function addUser(){
        $page_title = "Add User";
        $roles = Role::all();
        $usertypes = userTypes::get();
        return view('admin.user.add',compact('roles','usertypes','page_title'));
    }

    public function saveUser(Request $request){ 
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);
         $User = new User();
        //On left field name in DB and on right field name in Form/view
        $User->name = $request->input('name');
        $User->email = $request->input('email');
        $User->password = Hash::make($request->input('password'));
        $User->user_type = $request->input('user_type');
        $User->status = $request->input('status');
        $User->save();
        $User->assignRole($request->input('role'));
        return redirect()->back()->with('message', 'User added Successfully!');
    }


    public function editUser(Request $request){ 
        $page_title = "Edit User";
        $user_detail = User::where('id',$request->user_id)->first();
        $roles = Role::all();
        $user_role = $user_detail->getRoleNames()->first();
        return view('admin.user.edit',compact('user_detail','roles','user_role','page_title'));
    }


    public function updateUser(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->user_id);
        //On left field name in DB and on right field name in Form/view
        if($user) {
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        if($request->input('password')!=''){
        $user->password = Hash::make($request->input('password'));
        }
        $user->status = $request->input('status');
        $user->save(); 
        //$user->syncRoles($request->input('role'));
            return redirect()->back()->with('message', 'User Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'User Not Updated!'); 
        }

    }


    /***User Types module starts from here ***/

    public function userTypes(){ 
        $data['page_title'] = "User Type";
        $usertypes = userTypes::paginate(10);
        $data['usertypes'] = $usertypes;

        return view('admin.user.usertypelist')->with($data);
    }

    public function addUsertype(){ 
        $data['page_title'] = "Add User Type";
        return view('admin.user.addusertype')->with($data);
    }

    public function saveUsertype(Request $request){ 
        //print_r($request->all());die('pk');
        $validated = $request->validate([
            'designation' => 'required',
            'status' => 'required',
        ]);
         $usertypes = new userTypes();
        //On left field name in DB and on right field name in Form/view
        $usertypes->designation = $request->input('designation');
        $usertypes->status = $request->input('status');
        $usertypes->save();

        return redirect()->back()->with('message', 'User Type added Successfully!');
    }

    public function editUsertype(Request $request){
        $data['page_title'] = "Edit User Type";       
        $usertype_detail = userTypes::where('id',$request->usertype_id)->first();
        $data['usertype_detail'] = $usertype_detail;
        return view('admin.user.editusertype')->with($data); 

    }


    public function updateUsertype(Request $request){
        $validated = $request->validate([
            'designation' => 'required',
            'status' => 'required',
        ]);

        $usertype = userTypes::find($request->usertype_id);
        //On left field name in DB and on right field name in Form/view
        if($usertype) {
        $usertype->designation = $request->input('designation');
        $usertype->status = $request->input('status');
        $usertype->save(); 
        
            return redirect()->back()->with('message', 'User Type Updated Successfully!');
        } else {
            return redirect()->back()->with('error', 'User Type Not Updated!'); 
        }

    }


    public function deleteUsertype(Request $request){

        userTypes::where('id', $request->usertype_id)->delete();
        return redirect()->back()->with('message', 'User Type deleted Successfully!');

    }



    
}
