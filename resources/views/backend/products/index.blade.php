@extends('layouts.backend.master')
@section('title','All Products')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-1">
                <div class="col-sm-6">
                    <a href="{{route('product.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">
                            <span style='margin-left:5px'>Add Product</span>
                        </i>
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
                                All Products
                                <span class='badge bg-blue'>{{$products->count()}}</span>
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
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Category Name</th>
                                        <th>Description</th>
                                        <th>Sell Price</th>
                                        <th>Product Code</th>
                                        <th>Expire Date</th>
                                        <th>Quantity</th>
                                        <th>Stock</th>
                                        <th>Discount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$product)
                                    <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->category->category_name}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>${{$product->sell_price}}</td>
                                                <td>{{$product->product_code}}</td>
                                                <td>{{$product->expire_date}}</td>
                                                <td>{{$product->quantity}}</td>
                                                <td>
                                                    @if($product->stock == 0 )
                                                        <span class='badge bg-pink'>Out Of Stock</span>
                                                        @else
                                                        {{$product->stock}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($product->discount_price == 0)
                                                        <span class='badge bg-blue'>No Discount</span>
                                                        @else
                                                        {{($product->discount_price / 100) * $product->sell_price}}
                                                    @endif
                                                </td>
                                                <td class="project-actions text-right">
                                                    <a class="btn btn-info btn-sm" href="{{route('product.edit',$product->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        Edit
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="{{route('product.destroy',$product->id)}}" method='POST' enctype="multipart/form-data">
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
