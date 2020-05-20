@extends('layouts.backend.master')
@section('title','Add Category')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            @if(session('category'))
                <div class='alert alert-success mt-3'>{{session('category')}}</div>
            @endif
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Category</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('category.store')}}" method='post' enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='category_name'
                                    placeholder='Category Name'
                                    value="{{old('category_name')}}"
                                />
                                @if($errors->has('category_name'))
                                    <span class='text-danger'>Category Name is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Category</button>
                            <a href="{{route('category.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
