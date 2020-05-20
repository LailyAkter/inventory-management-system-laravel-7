@extends('layouts.backend.master')
@section('title','Add Sell')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Sell</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('sell.store')}}" method='post'>
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Product Name</label>
                                    <select name="product_id" id="" class='form-control'>
                                    <option>---Select Product----</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->product_name}}</option>
                                    @endforeach
                                    </select>
                                @if($errors->has('product_id'))
                                    <span class='text-danger'>Product Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Price</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='amount'
                                    placeholder='Enter Price'
                                    value="{{old('amount')}}"
                                />
                                @if($errors->has('amount'))
                                    <span class='text-danger'>Price is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='qty'
                                    placeholder='Quantity'
                                    value="{{old('qty')}}"
                                />
                                @if($errors->has('qty'))
                                    <span class='text-danger'>Quantity is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Sell Date</label>
                                <input 
                                    type="date" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='sell_date'
                                    placeholder='Sell Date'
                                    value="{{old('sell_date')}}"
                                />
                                @if($errors->has('sell_date'))
                                    <span class='text-danger'>Sell Date is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Sell</button>
                            <a href="{{route('sell.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
