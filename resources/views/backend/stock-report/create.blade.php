@extends('layouts.backend.master')
@section('title','Add Stock')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Stock</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('stock.store')}}" method='post' enctype="multipart/form-data">
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
                            <button type='submit' class='btn btn-success'>Create Stock</button>
                            <a href="{{route('stock.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
