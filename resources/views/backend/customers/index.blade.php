@extends('layouts.backend.master')
@section('title','All Customers')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{route('customer.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">Add Customer</i>
                    </a>
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
                                All customers
                                <span class='badge bg-blue'>{{$customers->count()}}</span>
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
                                        <th>customer Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $key=>$customer)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$customer->cust_name}}</td>
                                            <td>{{$customer->email}}</td>
                                            <td>{{$customer->phone}}</td>
                                            <td>{{$customer->address}}</td>
                                            <td>{{$customer->country}}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('customer.edit',$customer->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('customer.destroy',$customer->id)}}" method='POST' enctype="multipart/form-data">
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
