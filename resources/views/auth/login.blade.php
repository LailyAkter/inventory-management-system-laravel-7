@extends('layouts.frontend.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="main-w3layouts wrapper text-center">
                    <h1>{{ __('Login') }}</h1>
                    <div class="main-agileinfo">
                        <div class="agileits-top">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
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
                                <div class="wthree-text">
                                    <label class="anim">
                                    <input type="checkbox" class="checkbox" required="">
                                    <span>{{ __('Remember Me') }}</span>
                                    </label>
                                    <div class="clear"> </div>
                                </div>
                                <button type="submit" class='btn btn-success mb-2 mt-2' value="SIGNUP">Login</button>
                                @if (Route::has('password.request'))
                                    <p>
                                        <a style='color:#000' href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                        </a>
                                    </p>
                                @endif
                            </form>
                            <p>Do not have an Account? <a href="{{ route('register') }}" style='color:#000'> Register Now!</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
