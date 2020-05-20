@extends('layouts.backend.master')
@section('title','Edit Product')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('product.update',$product->id)}}" method='post' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name='product_name'
                                    placeholder='Product Name'
                                    value="{{$product->product_name}}"
                                />
                                @if($errors->has('product_name'))
                                    <span class='text-danger'>Product Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Feature Image</label>
                                <input 
                                    type="file" 
                                    class="form-control" 
                                    name='image'
                                    placeholder='Product Image'
                                />
                                @if($errors->has('image'))
                                    <span class='text-danger'>Product Image is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                    <select name="category_id" id="" class='form-control'>
                                    <option>---Select Category----</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id?"selected":""}}>{{$category->category_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('category_id'))
                                    <span class='text-danger'>Category Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name='description'
                                    placeholder='Description'
                                    value="{{$product->description}}"
                                />
                                @if($errors->has('description'))
                                    <span class='text-danger'>Description is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sell Price</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='sell_price'
                                    placeholder='Sell Price'
                                    value="{{$product->sell_price}}"
                                />
                                @if($errors->has('sell_price'))
                                    <span class='text-danger'>Sell Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Real Price</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='real_price'
                                    placeholder='Real Price'
                                    value="{{$product->real_price}}"
                                />
                                @if($errors->has('real_price'))
                                    <span class='text-danger'>Real Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Discount Price</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='discount_price'
                                    placeholder='Discount Price'
                                    value="{{$product->discount_price}}"
                                />
                                @if($errors->has('discount_price'))
                                    <span class='text-danger'>Discount Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Code</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name='product_code'
                                    placeholder='Product Code'
                                    value="{{$product->product_code}}"
                                />
                                @if($errors->has('product_code'))
                                    <span class='text-danger'>Product Code is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Expire Date</label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    name='expire_date'
                                    placeholder='Expire Date'
                                    value="{{$product->expire_date}}"
                                />
                                @if($errors->has('expire_date'))
                                    <span class='text-danger'>Expire Date is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='quantity'
                                    placeholder='Quantity'
                                    value="{{$product->quantity}}"
                                />
                                @if($errors->has('quantity'))
                                    <span class='text-danger'>Quantity is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Stock</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='stock'
                                    placeholder='Stock'
                                    value="{{$product->stock}}"
                                />
                                @if($errors->has('stock'))
                                    <span class='text-danger'>Stock is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity Per Carton</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='qty_per_carton'
                                    placeholder='Quantity Per Carton'
                                    value="{{$product->qty_per_carton}}"
                                />
                                @if($errors->has('qty_per_carton'))
                                    <span class='text-danger'>Quantity Per Carton is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Update Product</button>
                            <a href="{{route('product.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
