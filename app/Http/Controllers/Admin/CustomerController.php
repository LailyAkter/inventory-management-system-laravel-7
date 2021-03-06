<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Customer;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\NewCustomerAdd;
use Illuminate\Support\Facades\Notification;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::latest()->get();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($customers);
        }

        return view('backend.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'cust_name'=>'required',
            "email"=>'required',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required'
        ]);

        $customer = new Customer;
        $customer->cust_name = $request->cust_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->country = $request->country;
        $customer->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($customer);
        }
            
        // Mail send
        Notification::route('mail',$customer->email)
            ->notify(new NewCustomerAdd($customer));
        
        Toastr::success('Customer Saved Successfully','Success');

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $customer = Customer::findOrFail($id);

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($customer);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('backend.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $data = $request->validate([
            'cust_name'=>'required',
            "email"=>'required',
            'phone'=>'required',
            'address'=>'required',
            'country'=>'required'
        ]);

        $customer->cust_name = $request->cust_name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = trim($request->address);
        $customer->country = $request->country;
        $customer->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($customer);
        }

        Toastr::success('Customer Updated Successfully','Success');

        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($customer);
        }
        
        Toastr::error('Customer Deleted Successfully','Success');

        return redirect()->route('customer.index');
    }
}
