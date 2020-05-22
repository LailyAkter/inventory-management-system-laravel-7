@extends('layouts.backend.master')
@section('title','Add Product')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
    
                        <form action="{{route('product.store')}}" method='post' enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input 
                                    type="text" 
                                    class="form-control @error('product_name') is-invalid @enderror" 
                                    name='product_name'
                                    placeholder='Product Name'
                                    value="{{old('product_name')}}"
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
                                    <select  class="form-control @error('category_id') is-invalid @enderror " name="category_id">
                                    <option>---Select Category----</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old("category_id") == $category->id ? "selected": ""}}>{{$category->category_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('category_id'))
                                    <div class='invalid-feedback d-block'>Category Name is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Description</label>
                                <input 
                                    type="text" 
                                    class="form-control  @error('description') is-invalid @enderror" 
                                    name='description'
                                    placeholder='Description'
                                    value="{{old('description')}}"
                                />
                                @if($errors->has('description'))
                                    <div class='invalid-feedback'>Description is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sell Price</label>
                                <input 
                                    type="number" 
                                    class="form-control  @error('sell_price') is-invalid @enderror" 
                                    name='sell_price'
                                    placeholder='Sell Price'
                                    value="{{old('sell_price')}}"
                                />
                                @if($errors->has('sell_price'))
                                    <div class='invalid-feedback'>Sell Price is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Real Price</label>
                                <input 
                                    type="number" 
                                    class="form-control  @error('real_price') is-invalid @enderror" 
                                    name='real_price'
                                    placeholder='Real Price'
                                    value="{{old('real_price')}}"
                                />
                                @if($errors->has('real_price'))
                                    <div class='invalid-feedback'>Real Price is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Discount Price</label>
                                <input 
                                    type="number" 
                                    class="form-control  @error('discount_price') is-invalid @enderror" 
                                    name='discount_price'
                                    placeholder='Discount Price'
                                    value="{{old('discount_price')}}"
                                />
                                @if($errors->has('discount_price'))
                                    <div class='invalid-feedback'>Discount Price Maximum 2 Number</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Product Code</label>
                                <input 
                                    type="text" 
                                    class="form-control  @error('product_code') is-invalid @enderror" 
                                    name='product_code'
                                    placeholder='Product Code'
                                    value="{{old('product_code')}}"
                                />
                                @if($errors->has('product_code'))
                                    <div class='invalid-feedback'>Product Code is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Expire Date</label>
                                <input 
                                    type="date" 
                                    class="form-control  @error('expire_date') is-invalid @enderror" 
                                    name='expire_date'
                                    placeholder='Expire Date'
                                    value="{{old('expire_date')}}"
                                />
                                @if($errors->has('expire_date'))
                                    <div class='invalid-feedback'>Expire Date is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    class="form-control  @error('quantity') is-invalid @enderror" 
                                    name='quantity'
                                    placeholder='Quantity'
                                    value="{{old('quantity')}}"
                                />
                                @if($errors->has('quantity'))
                                    <div class='invalid-feedback'>Quantity is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Stock</label>
                                <input 
                                    type="number" 
                                    class="form-control  @error('stock') is-invalid @enderror" 
                                    name='stock'
                                    placeholder='Stock'
                                    value="{{old('stock')}}"
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
                                    value="{{old('qty_per_carton')}}"
                                />
                                @if($errors->has('qty_per_carton'))
                                    <div class='invalid-feedback'>Quantity Per Carton is Required</div>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Product</button>
                            <a href="{{route('product.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
