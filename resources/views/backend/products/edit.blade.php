@extends('layouts.backend.master')
@section('title','Edit Product')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center mt-4">
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
                                    class="form-control @error('product_name') is-invalid @enderror" 
                                    name='product_name'
                                    placeholder='Product Name'
                                    value="{{$product->product_name}}"
                                />
                                @if($errors->has('product_name'))
                                    <div class='invalid-feedback'>Product Name is Required</div>
                                @endif
                            </div>
                            <div class='form-group'>
                                <label>Feature Image</label>
                                <div class="custom-file mb-4">
                                    <input 
                                        type="file" 
                                        class="custom-file-input  @error('image') is-invalid @enderror " 
                                        name='image'
                                        placeholder='Product Image'
                                        {{old('image')}}
                                    />
                                    <label for="inputName" class='custom-file-label'>Choose file...</label>
                                    @if($errors->has('image'))
                                        <div class='invalid-feedback'>Product Image is Required</div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                    <select name="category_id"  class="form-control @error('image') is-invalid @enderror">
                                    <option>---Select Category----</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id?"selected":""}}>{{$category->category_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('category_id'))
                                    <div class='invalid-feedback'>Category Name is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('description') is-invalid @enderror" 
                                    name='description'
                                    placeholder='Description'
                                    value="{{$product->description}}"
                                />
                                @if($errors->has('description'))
                                    <div class='invalid-feedback'>Description is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sell Price</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('sell_price') is-invalid @enderror" 
                                    name='sell_price'
                                    placeholder='Sell Price'
                                    value="{{$product->sell_price}}"
                                />
                                @if($errors->has('sell_price'))
                                    <div class='invalid-feedback'>Sell Price is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Real Price</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('real_price') is-invalid @enderror" 
                                    name='real_price'
                                    placeholder='Real Price'
                                    value="{{$product->real_price}}"
                                />
                                @if($errors->has('real_price'))
                                    <div class='invalid-feedback'>Real Price is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Discount Price</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('discount_price') is-invalid @enderror" 
                                    name='discount_price'
                                    placeholder='Discount Price'
                                    value="{{$product->discount_price}}"
                                />
                                @if($errors->has('discount_price'))
                                    <div class='invalid-feedback'>Discount Price Maximum 2 Number</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Code</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('product_code') is-invalid @enderror" 
                                    name='product_code'
                                    placeholder='Product Code'
                                    value="{{$product->product_code}}"
                                />
                                @if($errors->has('product_code'))
                                    <div class='invalid-feedback'>Product Code is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Expire Date</label>
                                <input 
                                    type="date" 
                                    class="form-control @error('expire_date') is-invalid @enderror" 
                                    name='expire_date'
                                    placeholder='Expire Date'
                                    value="{{$product->expire_date}}"
                                />
                                @if($errors->has('expire_date'))
                                    <div class='invalid-feedback'>Expire Date is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('quantity') is-invalid @enderror" 
                                    name='quantity'
                                    placeholder='Quantity'
                                    value="{{$product->quantity}}"
                                />
                                @if($errors->has('quantity'))
                                    <div class='invalid-feedback'>Quantity is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Stock</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('stock') is-invalid @enderror" 
                                    name='stock'
                                    placeholder='Stock'
                                    value="{{$product->stock}}"
                                />
                                @if($errors->has('stock'))
                                    <div class='invalid-feedback'>Stock is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity Per Carton</label>
                                <input 
                                    type="number" 
                                    class="form-control @error('qty_per_carton') is-invalid @enderror" 
                                    name='qty_per_carton'
                                    placeholder='Quantity Per Carton'
                                    value="{{$product->qty_per_carton}}"
                                />
                                @if($errors->has('qty_per_carton'))
                                    <div class='invalid-feedback'>Quantity Per Carton is Required</div>
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
