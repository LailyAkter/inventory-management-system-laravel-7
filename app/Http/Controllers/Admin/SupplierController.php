<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Supplier;
use Brian2694\Toastr\Facades\Toastr;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::latest()->get();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($suppliers);
        }

        return view('backend.suppliers.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.suppliers.create');
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
            'sup_name'=>'required',
            "email"=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);

        $supplier = new Supplier;
        $supplier->sup_name = $request->sup_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($supplier);
        }

        Toastr::success('Supplier Saved Successfully','Success');

        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $supplier = Supplier::findOrFail($id);
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($supplier);
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
        $supplier = Supplier::findOrFail($id);
        return view('backend.suppliers.edit',compact('supplier'));
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
        $supplier = Supplier::findOrFail($id);
        $data = $request->validate([
            'sup_name'=>'required',
            "email"=>'required',
            'phone'=>'required',
            'address'=>'required',
        ]);
        $supplier->sup_name = $request->sup_name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($supplier);
        }

        Toastr::success('Supplier Updated Successfully','Success');

        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($supplier);
        }

        Toastr::error('Supplier Delete Successfully','Success');

        return redirect()->route('supplier.index');
    }
}
