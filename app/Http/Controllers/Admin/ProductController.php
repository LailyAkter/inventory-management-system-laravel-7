<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Admin\Category;
use Carbon\Carbon;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use Intervention\Image\Facades\Image;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Admin\Customer;
use App\Notifications\NewProductNotify;
use Illuminate\Support\Facades\Notification;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::latest()->get();
    
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($products);
        }

        return view('backend.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();

        return view('backend.products.create',compact('categories'));
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
            'product_name'=>'required|max:255|unique:products',
            'category_id'=>'required',
            "description"=>'required',
            'sell_price'=>'required|max:10',
            'real_price'=>'required|max:10',
            'discount_price' =>'required|max:2',
            'product_code'=>'required',
            'image'=>'required',
            'expire_date'=>'required',
            'quantity'=>'required',
            'stock'=>'required|max:6',
            'qty_per_carton'=>'required|max:10',

        ]);

        // get form images
        $image = $request->file('image');
        $slug = Str::slug($request->product_name);

        if(isset($image)){
            // make uniqe name for image
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            // check category directory is exists
            if(!Storage::disk('public')->exists('product')){
                Storage::disk('public')->makeDirectory('product');
            }
        // resize image for category and is_uploaded_file
        $products = Image::make($image)->resize(1600,479)->stream();
            Storage::disk('public')->put('product/'.$imageName,$products);
        }else{
            $imageName='default.png';
        }

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->sell_price = $request->sell_price;
        $product->real_price = $request->real_price;
        $product->discount_price = $request->discount_price;
        $product->product_code = $request->product_code;
        $product->image = $request->image;
        $product->expire_date = $request->expire_date;
        $product->quantity = $request->quantity;
        $product->stock = $request->stock;
        $product->qty_per_carton = $request->qty_per_carton;
        // dd($product);
        $product->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($product);
        }

        // Mail Send
        $customers = Customer::all();
        foreach($customers as $customer){
            Notification::route('mail',$customer->email)
                ->notify(new NewProductNotify($product));
        }

        Toastr::success('Product Saved Successfully','Success');
        
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $product = Product::findOrFail($id);
        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($product);
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
        $categories = Category::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.products.edit',compact('product','categories'));
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
        $data = $request->validate([
            'product_name'=>'required|max:255',
            'category_id'=>'required',
            "description"=>'required',
            'sell_price'=>'required|max:10',
            'real_price'=>'required|max:10',
            'discount_price' =>'required|max:2',
            'product_code'=>'required',
            'expire_date'=>'required',
            'quantity'=>'required',
            'stock'=>'required|max:6',
            'qty_per_carton'=>'required|max:10',
        ]);

        
        // get form images
        $image = $request->file('image');
        $slug = Str::slug($request->product_name);
        $product = Product::findOrFail($id);

        if(isset($image)){
        // make uniqe name for image
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        
        // check product directory is exists
        if(!Storage::disk('public')->exists('product')){
            Storage::disk('public')->makeDirectory('product');
        }

        // delete old image
        if(Storage::disk('public')->exists('product/'.$product->image)){
            Storage::disk('public')->delete('product/'.$product->image);
        }
        // resize image for product and is_uploaded_file
        $products = Image::make($image)->resize(1600,479)->stream();
        Storage::disk('public')->put('product/'.$imageName,$products);

        }else{
            $imageName=$product->image;
        }
        $product->product_name = $request->product_name;
        $product->slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->sell_price = $request->sell_price;
        $product->real_price = $request->real_price;
        $product->discount_price = $request->discount_price;
        $product->product_code = $request->product_code;
        $product->image = $imageName;
        $product->expire_date = $request->expire_date;
        $product->quantity = $request->quantity;
        $product->stock = $request->stock;
        $product->qty_per_carton = $request->qty_per_carton;
        $product->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($product);
        }

        Toastr::success('Product Updated Successfully','Success');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $products = Product::find($id);
        // delete  image
        if(Storage::disk('public')->exists('product/'.$products->image)){
            Storage::disk('public')->delete('product/'.$products->image);
        }
        $products->delete();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($product);
        }

        Toastr::error('Product Deleted Successfully','Success');

        return redirect()->route('product.index');
    }
}
