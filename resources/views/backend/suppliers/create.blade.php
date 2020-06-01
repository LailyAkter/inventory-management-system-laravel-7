@extends('layouts.backend.master')
@section('title','Add Supplier')
@section('content')
<div>
    <section class="content">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Supplier</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
            
                        <form action="{{route('supplier.store')}}" method='post'>
                        @csrf
                            <div class="form-group">
                                <label for="inputName">Supplier Name</label>
                                <input 
                                    type="text" 
                                    id="inputName" 
                                    class="form-control @error('sup_name') is-invalid @enderror" 
                                    name='sup_name'
                                    placeholder='Supplier Name'
                                    value="{{old('sup_name')}}"
                                />
                                @if($errors->has('sup_name'))
                                    <div class='invalid-feedback'>Supplier Name is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Email</label>
                                <input 
                                    type="email" 
                                    id="inputName" 
                                    class="form-control @error('email') is-invalid @enderror" 
                                    name='email'
                                    placeholder='Email'
                                    value="{{old('email')}}"
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
                                    class="form-control @error('phone') is-invalid @enderror" 
                                    name='phone'
                                    placeholder='Phone'
                                    value="{{old('phone')}}"
                                />
                                @if($errors->has('phone'))
                                    <div class='invalid-feedback'>Phone is Required</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="inputName">Address</label>
                                <textarea 
                                    class="form-control @error('address') is-invalid @enderror" 
                                    name='address'
                                    placeholder='Address'
                                >
                                {{old('address')}}
                                </textarea>
                                @if($errors->has('address'))
                                    <div class='invalid-feedback'>Address is Required</div>
                                @endif
                            </div>
                            <button type='submit' class='btn btn-success'>Create Supplier</button>
                            <a href="{{route('supplier.index')}}" class='btn btn-danger'>Back</a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
