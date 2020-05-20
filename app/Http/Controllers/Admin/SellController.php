<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Sell;
use App\Admin\Product;
use DB;
use App\Admin\ProductSell;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sells = DB::table('sells')
                ->leftJoin('products','products.id','=','sells.product_id')
                ->get(["*","sells.id as id"]);
        return view('backend.sells.index',compact('sells'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->get();
        return view('backend.sells.create',compact('products'));
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
            'amount'=>'required',
            'qty'=>'required',
            'sell_date'=>'required',
        ]);
        
        $product = Product::find($request->product_id);
        if($request->qty<$product->quantity && $product->stock > 0 ){
            $sell = new Sell;
            $sell->amount = $request->amount;
            $sell->qty = $request->qty;
            $sell->sell_date = $request->sell_date;
            $sell->product_id = $request->product_id;
            $sell->save();

            $product = Product::find($request->product_id);
            $product->quantity = $product->quantity - $request->qty;
            $product->save();
        }else{
            dd('product quantity is not enough');
        }
        
        return redirect()->route('sell.index');
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
        $products = Product::latest()->get();
        $sell = Sell::findOrFail($id);
        return view('backend.sells.edit',compact(['sell','products']));
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
        // $sell = Sell::findOrFail($id);
        // $data = $request->validate([
        //     'amount'=>'required',
        //     'qty'=>'required',
        //     'sell_date'=>'required',
        // ]);

        // $product = Product::find($request->product_id);
        // if($request->qty<$product->quantity && $product->stock > 0 ){
        //     $sell->amount = $request->amount;
        //     $sell->qty = $request->qty;
        //     $sell->sell_date = $request->sell_date;
        //     $sell->product_id = $request->product_id;
        //     $sell->save();

        //     $product = Product::find($request->product_id);
        //     $product->quantity = $product->quantity - $request->qty;
        //     $product->save();
        // }else{
        //     dd('product quantity is not enough');
        // }

        // $sell->save();
        // return redirect()->route('sell.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::findOrFail($id);
        $sell->delete();
        return redirect()->route('sell.index');
    }

    public function today_sell(){
        $sells = Sell::latest()->get();
        return view('backend.sells.today', compact('sells'));
    }


    public function totalProfit(){
    
        $product = Product::latest()->get();
        dd($product->sell_price[]);
        return view('backend.sells.total-profit');
    }
}
