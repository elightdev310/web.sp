@extends('sp.layouts.auth')

@section('htmlheader_title')
Sign Up
@endsection

@section('content')
<div class="register-box">
    <div class="register-box-body">

        <div class="logo-title-section text-center">
            <img class="site-logo" src="{{ config('sp.logo_url') }}" alt="">
            <h2>Register</h2>
        </div>

        @include('sp.commons.success_error')

        <form id="signup-form" action="{{ route('user.signup.post') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_action" value="register">
            <div class="form-group has-feedback">
                <label class="control-label">EMAIL ADDRESS</label>
                <input type="email" class="form-control" placeholder="Enter Email Address" name="email" value="{{ old('email') }}" />
                <!-- <span class="glyphicon glyphicon-envelope form-control-feedback"></span> -->
            </div>
            <div class="form-group has-feedback">
                <label class="control-label">PASSWORD</label>
                {{-- <a href="{{ url('/password/reset') }}" class="pull-right">Forgot password?</a> --}}
                <input type="password" class="form-control" placeholder="Password" name="password"/>
                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
            </div>
            <div class="form-group has-feedback">
                <label class="control-label">CONFIRM PASSWORD</label>
                {{-- <a href="{{ url('/password/reset') }}" class="pull-right">Forgot password?</a> --}}
                <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation"/>
                <!-- <span class="glyphicon glyphicon-lock form-control-feedback"></span> -->
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Register" name="submit" class="login-btn">
            </div>

        </form>

        @include('auth.partials.social_login')
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@endsection
