@extends('layouts.backend.master')
@section('title', 'Monthly Sales')
@section('content')
    <div>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h2>Monthly Sales</h2>
                        <div class='month'>
                            <a href="{{ url('/admin/monthly_sell', 'january') }}"><span  class='badge bg-blue' style='font-size:20px'>January</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'february') }}"><span  class='badge bg-pink' style='font-size:20px'>February</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'march') }}"><span  class='badge bg-red' style='font-size:20px'>March</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'april') }}"><span  class='badge bg-black' style='font-size:20px'>April</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'may') }}"><span  class='badge bg-purple' style='font-size:20px'>May</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'june') }}"><span  class='badge bg-green' style='font-size:20px'>June</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'july') }}"><span  class='badge bg-orange' style='font-size:20px'>July</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'august') }}"><span  class='badge bg-blue' style='font-size:20px'>August</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'september') }}"><span  class='badge bg-pink' style='font-size:20px'>Sepetember</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'october') }}"><span  class='badge bg-red' style='font-size:20px'>October</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'november') }}"><span  class='badge bg-black' style='font-size:20px'>November</span></a>
                            <a href="{{ url('/admin/monthly_sell', 'december') }}"><span  class='badge bg-purple' style='font-size:20px'>December</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header"> 
                                <h3 class="card-title">
                                    {{ strtoupper($month) }}
                                    <span class='badge bg-info'>{{$sells->count()}}</span>
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection
