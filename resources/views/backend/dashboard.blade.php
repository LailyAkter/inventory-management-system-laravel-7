@extends('layouts.backend.master')
@section('title','Dashboard')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                    <h3>{{$purchases->count()}}</h3>
                    <p>New Purchases</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{route('purchase.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{$sells->count()}}</h3>
                    <p>New Sell</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{route('sell.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>{{$products->count()}}</h3>
                    <p>New Product</p>
                    </div>
                    <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('product.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection