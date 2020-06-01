<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::latest()->get();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($categories);
        }
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
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
            'category_name'=>'required'
        ]);
        $category = new Category;
        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($category);
        }

        Toastr::success('Category Saved Successfully','Success');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $category = Category::findOrFail($id);

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($category);
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
        $category = Category::findOrFail($id);
        return view('backend.categories.edit',compact('category'));
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
        $category  = Category::findOrFail($id);

        $data = $request->validate([
            'category_name'=>'required'
        ]);

        $category->category_name = $request->category_name;
        $category->slug = Str::slug($request->category_name);
        $category->save();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($category);
        }

        Toastr::success('Category Updated Successfully','Success');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Json Format for postman
        if($request->expectsJson()){
            return response()->json($category);
        }
        
        Toastr::error('Category Delete Successfully','Success');
        return redirect()->route('category.index');
    }
}
