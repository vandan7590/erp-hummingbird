<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get();
        return view('customer.views.index',compact('customers'));
    }

    public function manage($id)
    {
        $customer = Customer::find($id);
        return view('customer.manage', compact('customer'));
    }

    public function store(Request $request,$id)
    {
        if($id != "new"){
            $customer = Customer::find($id);
            $customer->cust_name = $request->cust_name ?? '';
            $customer->cust_code = $request->cust_code ?? '';
            $customer->save();
            return redirect()->route('customer-manage',['id' => $customer->id])->with('success','Customer updated successfully.');
        }else{
            $customer = new Customer();
            $customer->cust_name = $request->cust_name ?? '';
            $customer->cust_code = $request->cust_code ?? '';
            $customer->save();
            return redirect()->route('customer-manage',['id' => $customer->id])->with('success','Customer updated successfully.');
        }

    }
}
