<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Sell;
use App\Admin\Product;
use DB;
use App\Admin\ProductSell;
use Brian2694\Toastr\Facades\Toastr;

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
        // dd($products);
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
            Toastr::success('Sell Saved Successfully','Success');
        }else{
            Toastr::warning('product quantity is not enough','Success');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::findOrFail($id);
        $sell->delete();
        Toastr::error('Sell Deleted Successfully','Success');
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

    //bujsi
    public function getPrice(Request $request){
        $product_id = $request->product_id;
        $price = Product::find($product_id)->sell_price;
        return response()->json([
            "price"=>$price
        ]);
    }
}
