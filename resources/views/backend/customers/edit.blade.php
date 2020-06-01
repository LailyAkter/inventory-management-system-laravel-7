@extends('layouts.backend.master')
@section('title','Edit Customer')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Customer</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('customer.update',$customer->id)}}" method='post' enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="inputName">Customer Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control @error('cust_name') is-invalid @enderror " 
                                    name='cust_name'
                                    placeholder='Customer Name'
                                    value="{{$customer->cust_name}}"
                                />
                                @if($errors->has('cust_name'))
                                    <div class='invalid-feedback'>Customer Name is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input 
                                    type="email" 
                                    id="inputName" 
                                    class="form-control @error('email') is-invalid @enderror " 
                                    name='email'
                                    placeholder='Email'
                                    value="{{$customer->email}}"
                                />
                                @if($errors->has('email'))
                                    <div class='invalid-feedback'>Email is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Phone</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control @error('phone') is-invalid @enderror " 
                                    name='phone'
                                    placeholder='Phone'
                                    value="{{$customer->phone}}"
                                />
                                @if($errors->has('phone'))
                                    <span class='invalid-feedback'>Phone is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <textarea 
                                    class="form-control @error('address') is-invalid @enderror " 
                                    name='address'
                                    placeholder='Address'
                                >
                                {{$customer->address}}
                                </textarea>
                                @if($errors->has('address'))
                                    <span class='invalid-feedback'>Address is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Country</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control @error('country') is-invalid @enderror " 
                                    name='country'
                                    placeholder='Country'
                                    value="{{$customer->country}}"
                                />
                                @if($errors->has('country'))
                                    <span class='invalid-feedback'>Country is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Edit Customer</button>
                            <a href="{{route('customer.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
