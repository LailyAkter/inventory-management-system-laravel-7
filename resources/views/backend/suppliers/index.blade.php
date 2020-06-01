@extends('layouts.backend.master')
@section('title','All Suppliers')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-1">
                <div class="col-sm-6">
                    <a href="{{route('supplier.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">
                        <span style='margin-left:5px'>Add Supplier</span>
                        </i>
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
                                All Suppliers
                                <span class='badge bg-blue'>{{$suppliers->count()}}</span>
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
                                        <th>Supplier Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th width="8%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($suppliers as $key=>$supplier)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$supplier->sup_name}}</td>
                                            <td>{{$supplier->email}}</td>
                                            <td>{{$supplier->phone}}</td>
                                            <td>{{$supplier->address}}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('supplier.edit',$supplier->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <span style='margin-left:5px'>EDIT</span>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('supplier.destroy',$supplier->id)}}" method='POST' enctype="multipart/form-data">
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
