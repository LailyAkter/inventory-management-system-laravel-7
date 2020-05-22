@extends('layouts.backend.master')
@section('title','All Stocks')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('stock.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">Add Stocks</i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Stocks
                                <span class='badge bg-blue'>{{$stocks->count()}}</span>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Slug</th>
                                        <th>Sell Price</th>
                                        <th>Product Code</th>
                                        <th>Expire Date</th>
                                        <th>Quantity</th>
                                        <th>Per Carton</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stocks as $key=>$stock)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$stock->product->product_name}}</td>
                                            <td>{{$stock->product->slug}}</td>
                                            <td>{{$stock->product->sell_price}}</td>
                                            <td>{{$stock->product->product_code}}</td>
                                            <td>{{$stock->product->expire_date}}</td>
                                            <td>{{$stock->product->quantity}}</td>
                                            <td>{{$stock->product->qty_per_carton}}</td>
                                            <td>
                                                @if($stock->product->stock == 0)
                                                    <span class='badge bg-blue' style='font-size:16px'>Out Of Stock</span>
                                                @else
                                                    {{$stock->product->stock}}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{route('stock.destroy',$stock->id)}}" method='POST' enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type='submit' class="btn btn-danger btn-sm mt-3">
                                                        <i class="fas fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
