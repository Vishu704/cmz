<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Savecase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;
use Session;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:dashboard', ['only' => ['index']]);
    // }

    //
    public function index(Request $request){


        $data['page_title'] = "Dashboard";
        return view('admin.dashboard')->with($data);

    }


}
