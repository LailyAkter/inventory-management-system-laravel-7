@extends('layouts.backend.master')
@section('title','All Purchases')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('purchase.create')}}" class='btn btn-primary' style='font-size:20px;'>
                        <i class="fas fa-plus">Add Purchase</i>
                    </a>
                    <a href="{{url('/admin/purchase/today')}}" class='btn btn-danger'>Today Purchase</a>
                    <a href="{{URL::to('/admin/purchase/monthly')}}" class='btn btn-info'>Month Purchase</a>
                    <a href="{{URL::to('/admin/purchase/yearly')}}" class='btn btn-success'>Yearly Purchase</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Total Purchases : 
                                <span class='badge bg-red' style='font-size:18px'>{{ $purchases->count() }}</span>
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
                        <div class="card-body p-0">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Supplier Name</th>
                                        <th>Purchase ID</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Purchase Date</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $key=>$purchase)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$purchase->product_name}}</td>
                                            <td>{{$purchase->supplier->sup_name}}</td>
                                            <td>{{$purchase->purchase_id}}</td>
                                            <td>{{$purchase->quantity}}</td>
                                            <td>{{$purchase->buying_price}}</td>
                                            <td>{{$purchase->pur_date}}</td>
                                            <td>${{ number_format($purchase->buying_price * $purchase->quantity) }}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('purchase.edit',$purchase->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('purchase.destroy',$purchase->id)}}" method='POST'>
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
