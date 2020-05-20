@extends('layouts.backend.master')
@section('title','Add Customer')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center">
            @if(session('customer'))
                <div class='alert alert-success mt-3'>{{session('customer')}}</div>
            @endif
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Customer</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('customer.store')}}" method='post' enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Customer Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='cust_name'
                                    placeholder='Customer Name'
                                    value="{{old('cust_name')}}"
                                />
                                @if($errors->has('cust_name'))
                                    <span class='text-danger'>Customer Name is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input 
                                    type="email" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='email'
                                    placeholder='Email'
                                    value="{{old('email')}}"
                                />
                                @if($errors->has('email'))
                                    <span class='text-danger'>Email is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Phone</label>
                                <input 
                                    type="number" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='phone'
                                    placeholder='Phone'
                                    value="{{old('phone')}}"
                                />
                                @if($errors->has('phone'))
                                    <span class='text-danger'>Phone is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <textarea 
                                    class="form-control" 
                                    name='address'
                                    placeholder='Address'
                                >
                                {{old('address')}}
                                </textarea>
                                @if($errors->has('address'))
                                    <span class='text-danger'>Address is Required</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Country</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control" 
                                    name='country'
                                    placeholder='Country'
                                    value="{{old('country')}}"
                                />
                                @if($errors->has('country'))
                                    <span class='text-danger'>Country is Required</span>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create customer</button>
                            <a href="{{route('customer.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
