<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customerenquiry;

class CustomerenquiryController extends Controller
{
    public function index(){
        $data['page_title'] = "Customer Enquiry";
        $customerenquiries = Customerenquiry::paginate('20');
        $data['customerenquiries'] = $customerenquiries;
        return view('admin.customerenquiry.customer_enquiry')->with($data);

    }
}