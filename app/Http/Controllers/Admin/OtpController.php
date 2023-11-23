<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\Saleauth;
use Illuminate\Support\Str;

class OtpController extends Controller
{
    //
    public function index(){ 
        $data['page_title'] = "Otp Listing";
        $sale_auth = Saleauth::first();
        $otps = Otp::with('user')
                    ->orderBy('id','desc')
                    ->paginate(10);

        $data['otps'] = $otps;
        $data['sale_auth'] = $sale_auth;

        return view('admin.otp.list')->with($data);
    }

    

    public function refreshAuthid(Request $request){
        $response = array();
        try {
            $uuid = Str::uuid();
            /*** Update Auth Id ****/
            $sale_auth = Saleauth::first();
            $sale_auth->auth_id = $uuid;
            $sale_auth->status = 'active';
            $sale_auth->save(); 
            $response['msg'] = 'Auth Id Updated Successfully';
            $response['auth_id'] = $uuid;
            $response['status'] = 'true';
            return json_encode($response);
        } catch (Exception $e) {
            $response['msg'] = $e->getMessage();
            $response['auth_id'] = '';
            $response['status'] = 'false';
            return json_encode($response);
        }
    
       
    }
}
