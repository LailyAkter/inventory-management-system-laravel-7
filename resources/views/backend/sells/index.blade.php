@extends('layouts.backend.master')
@section('title','All Sales')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('sell.create')}}" class='btn btn-primary' style='font-size:20px;'>
                        <i class="fas fa-plus">
                        <span style='margin-left:5px'>Add Sale</span>
                        </i>
                    </a>
                    <a href="{{url('/admin/today_sell')}}" class='btn btn-danger'>Today Sale</a>
                    <a href="{{URL::to('/admin/monthly_sell')}}" class='btn btn-info'>Monthly Sale</a>
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
                                All Sells
                                <span class='badge bg-blue' style='font-size:18px'>{{ $sells->count()}}</span>
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
                                        <th>SL</th>
                                        <th>Total Price</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th width='10%'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sells as $key=>$sell)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>${{ number_format($sell->amount * $sell->qty, 2) }}</td>
                                            <td>{{$sell->product_name}}</td>
                                            <td>${{number_format($sell->amount,2) }}</td>
                                            <td>{{$sell->qty}}</td>
                                            <td>
                                                <form action="{{route('sell.destroy',$sell->id)}}" method='POST' enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button  type='submit' class="btn btn-danger btn-sm mt-3">
                                                        <i class="fas fa-trash"></i>
                                                        <span style='margin-left:5px'>DELETE</span>
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
