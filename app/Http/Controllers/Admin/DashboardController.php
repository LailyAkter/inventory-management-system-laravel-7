<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Purchase;
use App\Admin\Sell;
use App\Admin\Product;
use App\Admin\Customer;

class DashboardController extends Controller
{
    public function index(){
        $purchases = Purchase::latest()->get();
        $sells = Sell::latest()->get();
        $products = Product::latest()->get();
        $customers = Customer::latest()->get();
        return view('backend.dashboard',compact(['purchases','sells','products','customers']));
    }
}
