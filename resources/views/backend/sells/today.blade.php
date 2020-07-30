@extends('layouts.backend.master')
@section('title', 'Today Sale')
@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span style='font-size:25px'>Date:</span> <span class='text-primary' style='font-size:25px'>{{ date('d F Y') }}</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header"> 
                                <h3 class="card-title">
                                Today Sales
                                <span class='badge bg-info'>{{$sells->count()}}</span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sells as $key => $sell)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{$sell->product_name}}</td>
                                            <td>${{number_format($sell->amount,2) }}</td>
                                            <td>{{ $sell->qty }}</td>
                                            <td>${{ number_format($sell->amount * $sell->qty, 2) }} </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{route('sell.index')}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Back
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection
