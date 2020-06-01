<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->namespace('Admin')->prefix('admin')->group(function(){
    Route::get('/dashboard','DashboardController@index');
    Route::resource('category','CategoryController');
    Route::resource('customer','CustomerController');
    Route::resource('supplier','SupplierController');
    Route::resource('product','ProductController');
    Route::resource('expense','ExpenseController');
    Route::get('today_expense','ExpenseController@today_expense');
    Route::get('month_expense/{month?}','ExpenseController@month_expense');
    Route::get('yearly_expense/{year?}','ExpenseController@yearly_expense');
    Route::resource('product','ProductController');
    Route::resource('stock','StockController');

    Route::resource('sell','SellController');
    Route::get('today_sell','SellController@today_sell');
    Route::get('api/getprice',"SellController@getPrice");

    Route::get('/totalProfit','SellController@totalProfit');
    Route::resource('purchase','PurchaseController');
    Route::resource('order','OrderController');
    Route::get('setting','SettingController@index');
    Route::put('update/profile','SettingController@updateProfile')->name('profile.update');
    Route::put('change/password','SettingController@changePassword')->name('change.password');
});
Auth::routes();

