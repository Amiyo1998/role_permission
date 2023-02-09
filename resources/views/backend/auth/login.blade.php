@extends('backend.auth.auth_master')
@section('auth-title')
 Admin | Admin Panel
@endsection
@section('auth-content')
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="{{ route('admin.login.submit')}}" method="POST">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>Hello there, Sign in and start managing your Admin Template</p>
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">{{ session('message') }}</div>
                @endif
                @if(Session::has('logout_error'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">{{ session('logout_error') }}</div>
                @endif
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" id="exampleInputEmail1" name="email" value="{{ old('email')}}" class="@error('email') is-invalid @enderror">
                        <i class="ti-email"></i>
                        <div class="text-danger"></div>
                        @error('email')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password" class="@error('password') is-invalid @enderror">
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                        @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">
                                <input type="checkbox" class="custom-control-input" id="customControlAutosizing" name="remember">
                                <label class="custom-control-label" for="customControlAutosizing">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#">Forgot Password?</a>
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
