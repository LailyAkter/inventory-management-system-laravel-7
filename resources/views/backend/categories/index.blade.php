@extends('layouts.backend.master')
@section('title','All Categories')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 mt-1">
                <div class="col-sm-6">
                    <a href="{{route('category.create')}}" class='btn btn-primary'>
                        <i class="fas fa-plus">
                            <span style='margin-left:5px'>Add Category</span>
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
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                All Categories
                                <span class='badge bg-blue'>{{$categories->count()}}</span>
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
                                        <th>Category Name</th>
                                        <th>Slug</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width: 8%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $key=>$category)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->category_name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->created_at->toFormattedDateString()}}</td>
                                            <td>{{$category->updated_at->toFormattedDateString()}}</td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-info btn-sm" href="{{route('category.edit',$category->id)}}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <span style='margin-left:5px'>EDIT</span>
                                                </a>
                                            </td>
                                            <td>
                                                <form action="{{route('category.destroy',$category->id)}}" method='POST' enctype="multipart/form-data">
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
