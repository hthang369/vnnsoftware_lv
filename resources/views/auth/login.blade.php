@extends('layouts.master')

@section('header_title')
    Log in
@endsection

@section('content')
<style>
.login-wrap .icon {
    width: 80px;
    height: 80px;
    background: #1089ff;
    border-radius: 50%;
    font-size: 30px;
    margin: 0 auto;
    margin-bottom: 10px;
}
</style>
<div class="row justify-content-center">
    <div class="col-md-7 col-lg-5">
        <div class="login-wrap p-4 p-md-5">
            <div class="icon d-flex align-items-center justify-content-center">
                <span class="fa fa-user-o"></span>
            </div>
            <h3 class="text-center mb-4">Sign In</h3>
            @if(session('notice'))
            <p style="color:red">
                {{session('notice')}}
            </p>
            @endif
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" class="form-control rounded-left @error('username') is-invalid @enderror" placeholder="Username" required="">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group d-flex">
                    <input type="password" name="password" class="form-control rounded-left @error('password') is-invalid @enderror" placeholder="Password" required="">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Login</button>
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-50">
                        <label class="checkbox-wrap checkbox-primary">Remember Me
                            <input type="checkbox" checked="">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                    <div class="w-50 text-md-right">
                        <a href="{{ route('password.request') }}">Forgot Password</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection