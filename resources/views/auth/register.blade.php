@extends('layouts.frontend.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-w3layouts wrapper text-center">
                    <h1>{{ __('Register') }}</h1>
                    <div class="main-agileinfo">
                        <div class="agileits-top">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div>
                                    <input 
                                        class="text" 
                                        type="text" 
                                        name="user_name" 
                                        placeholder="Username" 
                                        required=""
                                    />
                                </div>
                                <div class='mt-4'> 
                                    <input 
                                        class="text" 
                                        type="text" 
                                        name="name" 
                                        class="@error('name') is-invalid @enderror"
                                        placeholder="Enter Your Name" 
                                        required=""
                                    />
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class='form-group mt-4'> 
                                    <input 
                                        class="text" 
                                        id="email" 
                                        type="email" 
                                        class=" @error('email') is-invalid @enderror" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required=""
                                        placeholder='Enter Your Email'
                                    />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class='form-group mt-4'> 
                                    <input 
                                        class="text" 
                                        id="password" 
                                        type="password" 
                                        class=" @error('password') is-invalid @enderror" 
                                        name="password" 
                                        value="{{ old('password') }}" 
                                        required=""
                                        placeholder='Enter Your Password'
                                    />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class='form-group mt-4'> 
                                    <input 
                                        class="text" 
                                        id="password-confirm" 
                                        type="password"
                                        name="password_confirmation" 
                                        value="{{ old('password') }}" 
                                        required=""
                                        placeholder='Enter Your Password'
                                    />
                                </div>
                                <div class="wthree-text">
                                    <label class="anim">
                                    <input type="checkbox" class="checkbox" required="">
                                    <span>I Agree To The Terms &amp; Conditions</span>
                                    </label>
                                    <div class="clear"> </div>
                                </div>
                                <button type="submit" class='btn btn-success mb-2 mt-2' value="SIGNUP">Register</button>
                            </form>
                            <p>Do have an Account? <a href="{{ route('login') }}" style='color:#000'> Login Now!</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
