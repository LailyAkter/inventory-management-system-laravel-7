@extends('layouts.backend.master')
@section('title','Add Purchase')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Purchase</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('purchase.store')}}" method='post'>
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name='product_name'
                                    placeholder='Product Name'
                                    value="{{old('product_name')}}"
                                />
                                @if($errors->has('product_name'))
                                    <span class='text-danger'>Product Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Supplier Name</label>
                                    <select name="supplier_id" id="" class='form-control'>
                                    <option>---Select Supplier----</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->id}}">{{$supplier->sup_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('supplier_id'))
                                    <span class='text-danger'>Supplier Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Purchase ID</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name='purchase_id'
                                    placeholder='Purchase ID'
                                    value="{{old('purchase_id')}}"
                                />
                                @if($errors->has('purchase_id'))
                                    <span class='text-danger'>Purchase ID is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='quantity'
                                    placeholder='Quantity'
                                    value="{{old('quantity')}}"
                                />
                                @if($errors->has('quantity'))
                                    <span class='text-danger'>Quantity is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Buying Price</label>
                                <input 
                                    type="number" 
                                    class="form-control" 
                                    name='buying_price'
                                    placeholder='Buying Price'
                                    value="{{old('buying_price')}}"
                                />
                                @if($errors->has('buying_price'))
                                    <span class='text-danger'>Buying Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Purchase Date</label>
                                <input 
                                    type="date" 
                                    class="form-control" 
                                    name='pur_date'
                                    placeholder='Purchase Date'
                                    value="{{old('pur_date')}}"
                                />
                                @if($errors->has('pur_date'))
                                    <span class='text-danger'>Purchase Date is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Purchase</button>
                            <a href="{{route('purchase.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
