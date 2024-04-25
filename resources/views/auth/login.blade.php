@extends('frontend.main_master')
@section('content')
@section('title')
    Finance
@endsection

{{-- <div class="breadcrumb-area bg-gray">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <ul>
                <li class="active">login - register </li>
            </ul>
        </div>
    </div>
</div> --}}


<div class="login-register-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ms-auto me-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                  
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="POST"
                                        action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                                        @csrf
                                        @if (session('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                        <label for="">Enter Name / Email / Phone</label>
                                        <input type="text" name="login" id="login" placeholder="" required />
                                        <input type="password" name="password" id="password" placeholder="Password"
                                            required />
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="remember" id="remember">
                                                <label>Remember me</label>
                                                <a href="{{ route('user.forget.password.get') }}">Forgot Password?</a>
                                            </div>
                                            <button type="submit" name="" id="">Login</button>
                                            {{-- <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="form-group" class="google">
                                                                <a href="{{url('auth/google')}}"><i class="fa fa-google"></i>Google</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <a href="{{url('auth/facebook')}}"><i class="fa fa-facebook">Facebook</i></a>
                                                              </div>
                                                        </div>
                                                    </div> --}}
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="alert alert-danger mx-2 mt-2" role="alert">
                                Your registration will be approved with in 24 hours by Finance verification team.
                              </div>
                            <div class="login-form-container">
                                
                                <div class="login-register-form">
                                   
                                    <form method="POST" action="{{ route('user.register.store') }}">
                                        @csrf
                                        <input type="text" name="name" id="name" placeholder="Username"
                                            required>
                                            @error('name') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="text" name="company_name" id="company_name"
                                            placeholder="Company name" required>
                                            @error('company_name') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="number" name="phone" id="phone" placeholder="Mobile number"
                                            required />
                                            @error('phone') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="email" name="email" id="email" placeholder="E-mail"
                                            required>
                                            @error('email') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="password" name="password" id="password" placeholder="Password"
                                            required>
                                            @error('password') 
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm Password" required>
                                       
                                        <button type="submit" class="btn btn-flat btn-success">Register Here!</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
