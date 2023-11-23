<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Savecase;

use Auth;
class HomeController extends Controller
{
    //

    function __construct()
    {
         //$this->middleware('permission:case-add', ['only' => ['index','save']]);
    }


    public function index(){
        $data['page_title'] = "Home";
        //return view('home')->with($data);
        return view('comingsoon')->with($data);

    }

    public function save(Request $request){
        $data['page_title'] = "Home";
        $user = Auth::user();
       
        $customer_id = $this->generateBarcodeNumber();


        $case = new Savecase();
        //On left field name in DB and on right field name in Form/view
        $case->customer_id = $customer_id;
        $case->customername = $request->input('customername');
        $case->customerphone = $request->input('customerphone');
        $case->remote = $request->input('remote');
        $case->country = $request->input('country');
        $case->sale_status = $request->input('sale_status');
        $case->payment_status = $request->input('payment_status');
        $case->p2pdate = $request->input('p2pdate');
        $case->addedby = $user->id;
        $case->currency = $request->input('currency');
        $case->amount = $request->input('amount');
        $case->email = $request->input('email');
        $case->addressline1 = $request->input('addressline1');
        $case->addressline2 = $request->input('addressline2');
        $case->city = $request->input('city');
        $case->state = $request->input('state');
        $case->zip = $request->input('zip');
        $case->bttr = $request->input('bttr');
        $case->issue = $request->input('issue');
        $case->additionalissue = $request->input('additionalissue');
        $case->remarks = $request->input('remarks');
        $case->bankinfo = $request->input('bankinfo');
        $case->status = 'pending';
        $case->save();


        return redirect()->back()->with('message', 'Entry Submitted Successfully!');

    }

    public function generateBarcodeNumber() {
        $number = mt_rand(1000000000, 9999999999); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
    }
    
    public function barcodeNumberExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Savecase::whereCustomerId($number)->exists();
    }
}
