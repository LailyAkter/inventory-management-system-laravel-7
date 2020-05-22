@extends('layouts.backend.master')
@section('title','Edit Category')
@section('content')
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if(session('category'))
                <div class='text-success'>{{session('category')}}</div>
                @endif
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Category</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update',$category->id)}}" method='post' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Category Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control  @error('category_name') is-invalid @enderror" 
                                    name='category_name'
                                    placeholder='Category Name'
                                    value="{{$category->category_name}}"
                                />
                                @if($errors->has('category_name'))
                                    <div class="invalid-feedback" style='font-size:16px'>Category Name is Required</div>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Edit Category</button>
                            <a href="{{route('category.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
