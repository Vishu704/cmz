<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Otp;
use App\Mail\sendEmail;
use Hash;
use Session;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //

    public function index(){
        $data['page_title'] = "Login";
        return view('admin.login')->with($data);

    }

    public function requestOtp(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $otp = rand(1000,9999);
        
        $user = User::where('email','=',$request->email)->where('status','active')->update(['otp' => $otp]);        

        if($user){
            $userp = User::where('email', request('email'))->first();

            /*** disable old otp  *****/
            Otp::where('user_id','=',$userp->id)
            ->where('status','=','active')
            ->update(['status' => 'expired']);

            /****  save New otp   *****/ 
            $otps = new Otp();
            $otps->user_id = $userp->id;
            $otps->otp = $otp;
            $otps->status = 'active';
            $otps->save();

            if(Hash::check(request('password'), $userp->password)){

                $details = [
                    'subject' => 'Login Authentication OTP - '. $request->email,
                    'body' => 'Your OTP is : '. $otp
                ];
            
			if((request('email')=='sg@itworldpro.net') || (request('email')=='md@itworldpro.net') || (request('email')=='ab@itworldpro.net') || (request('email')=='jatin@itworldpro.net') || (request('email')=='vijay@itworldpro.net')){
               //\Mail::to('analytiqbilling@gmail.com')->send(new sendEmail($details));
				\Mail::to('parveenft43@gmail.com')->send(new sendEmail($details)); 
			}
                $data['message'] = "Otp sent on your Email Address";
                $data['error'] = "";
                $data['email'] = $request->email;
                $data['password'] = $request->password;
            
                return view('admin.requestotp')->with($data);
            } else {
                return redirect()->back()->with('error', 'Wrong Password');
            }
        }
        else{
            //return response(["status" => 401, 'message' => 'Invalid']);
            return redirect()->back()->with('error', 'Invalid Email Address');
        }
    }

    public function authenticateUser(Request $request)
    {
       //echo Hash::make($request->password);die('pk');
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        //$user  = User::where([['email','=',$request->email]])->first();
        
        if($user){
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $roles = $user->getRoleNames();
                
                if($roles[0]=='Sales Agent'){
                    return redirect()->intended('add-sale')
                                ->with('message', 'Loggedin Successfully');
                } else if($roles[0]=='Follow Up'){
                    return redirect()->intended('followup-dashboard')
                                ->with('message', 'Loggedin Successfully');
                } else if($roles[0]=='Tech Agent' || $roles[0]=='Tech-sale'){
                    return redirect()->intended('tech-dashboard')
                                ->with('message', 'Loggedin Successfully');
                } else if($roles[0]=='Junior Tech'){
                    return redirect()->intended('juniortech-dashboard')
                                ->with('message', 'Loggedin Successfully');
                } else {
                    return redirect()->intended('dashboard')
                                ->with('message', 'Loggedin Successfully');
                }
            }
        }

         $data['error'] = "Invalid Otp";
         $data['message'] = "";
         $data['email'] = $request->email;
         $data['password'] = $request->password;
       
         return view('admin.requestotp')->with($data);
    }


    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('brdoclogin');
    }




}
