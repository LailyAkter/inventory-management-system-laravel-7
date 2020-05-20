@extends('layouts.backend.master')
@section('title', 'Today Purchase')
@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <h2>
                        Today Purchase
                        <span  class='badge bg-blue' style='font-size:25px'>{{ date('d F Y') }}</span>
                        </h2>
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
                                    Total Purchases : <span class='badge bg-red' style='font-size:18px'>{{ $purchases->count('amount') }}</span>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Buying Price</th>
                                        <th>Total Price</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($purchases as $key => $purchase)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $purchase->product->product_name }}</td>
                                            <td>${{number_format($purchase->amount,2) }}</td>
                                            <td>{{ $purchase->quantity }}</td>
                                            <td>${{ number_format($purchase->amount * $purchase->quantity, 2) }} </td>
                                            <td class="project-actions">
                                                <a class="btn btn-info btn-sm" href="{{route('purchase.index')}}">
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
