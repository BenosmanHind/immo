<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminCustomerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $customers = User::where('type','customer')->orderBy('created_at','desc')->get();
        return view('admin.customers',compact('customers'));
    }

    public function edit($id){
    $customer = User::find($id);
    return view('admin.modal-edit-customer',compact('customer'));
    }

    public function update($id , Request $request){
        $customer = User::find($id);
        $customer->status = $request->status;
        $customer->save();
        return $customer;
    }
}
