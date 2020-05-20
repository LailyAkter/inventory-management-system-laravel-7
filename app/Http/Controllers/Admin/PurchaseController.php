<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Purchase;
use App\Admin\Supplier;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::latest()->get();
        return view('backend.purchases.index',compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::latest()->get();
        return view('backend.purchases.create',compact('suppliers'));
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
            'product_name'=>'required',
            'supplier_id'=>'required',
            'purchase_id'=>'required',
            'quantity'=>'required',
            'buying_price'=>'required',
            'pur_date'=>'required'
        ]);

        $purchase = new Purchase;
        $purchase->product_name = $request->product_name;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_id = $request->purchase_id;
        $purchase->quantity = $request->quantity;
        $purchase->buying_price = $request->buying_price;
        $purchase->pur_date = $request->pur_date;
        $purchase->save();
        return redirect()->route('purchase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::latest()->get();
        $purchase = Purchase::findOrFail($id);
        return view('backend.purchases.edit',compact(['purchase','suppliers']));
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
        $purchase = Purchase::findOrFail($id);
        $data = $request->validate([
            'product_name'=>'required',
            'supplier_id'=>'required',
            'purchase_id'=>'required',
            'quantity'=>'required',
            'buying_price'=>'required',
            'pur_date'=>'required'
        ]);
        $purchase->product_name = $request->product_name;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_id = $request->purchase_id;
        $purchase->quantity = $request->quantity;
        $purchase->buying_price = $request->buying_price;
        $purchase->pur_date = $request->pur_date;
        $purchase->save();
        return redirect()->route('purchase.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();
        return redirect()->route('purchase.index');
    }
}
