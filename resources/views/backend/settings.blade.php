@extends('layouts.backend.master')
@section('title','Update User And Reset Password')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mt-5">
                <div class="card-header">
                    <h5 class="card-title">Settings</h5>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a href="#update" role="tab" data-toggle="tab" class="nav-link">Update Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#change" role="tab" data-toggle="tab" class="nav-link">Change Password</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane  mt-3" role="tabpanel" id="update">
                            <form action="{{url('admin/update/profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name='active' value='1'>
                                <div class="form-group">
                                    <label class="control-label">Name</label>
                                    <input
                                        type="text"
                                        value="{{Auth::user()->name}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        name='name'
                                        placeholder="Name"
                                    />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback"> Name is Required</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label  class="control-label">Email</label>
                                    <input
                                        type="email"
                                        value="{{Auth::user()->email}}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name='email'
                                        placeholder="Email"
                                    />
                                    @If($errors->has('email'))
                                        <div class='invalid-feedback'>Email is Required</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label  class="control-label">Profile Image</label>
                                    <input
                                        type="file"
                                        value="{{Auth::user()->image}}"
                                        class="form-control @error('image') is-invalid @enderror"
                                        name='image'
                                        placeholder="Image"
                                    />
                                    @if($errors->has('image'))
                                        <div class='invalid-feedback'>Profile Image is Required</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane  mt-3" role="tabpanel" id="change">
                            <form action="{{url('admin/change/password')}}" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name='active' value='2'>
                                <div class="form-group">
                                    <label class="control-label">Old Password</label>
                                    <input
                                        type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        name='old_password'
                                        placeholder="Old Password"
                                    />
                                    @If($errors->has('old_password'))
                                        <div class='invalid-feedback'>Old Password is Required</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input
                                        type="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name='password'
                                        placeholder="Enter New Password"
                                    />
                                    @If($errors->has('password'))
                                        <div class='invalid-feedback'> New Password is Required</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Confirm Password</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        name='password_confirmation'
                                        placeholder="Enter Password Again"
                                    />
                                </div>
                                <div class='form-group'>
                                    <button type='submit' class='btn btn-success'>Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
           var activeItem = <?php
            if(old('active')){
                if(old('active')==1)
                {
                    echo '1';
                }
                else{
                    echo '2';
                }
                }else if($active==1){
                    echo '1';
                }else{
                    echo "2";
                }
            ?>; //this should be 1 or 2
            if(activeItem==1){
            let tebpen = document.querySelector(".nav-link[href='#update']");
            let content = document.querySelector("#update");
            tebpen.classList.add("active")
            content.classList.add("active")

           }else{
               let tebpen = document.querySelector(".nav-link[href='#change']");
            let content = document.querySelector("#change");
            tebpen.classList.add("active")
             content.classList.add("active")

           }
        </script>
    </div>
@endsection
