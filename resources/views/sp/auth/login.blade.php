@extends('sp.layouts.auth')

@section('htmlheader_title')
Login
@endsection

@section('content')
<div class="login-box">
    <div class="login-box-body">

        <div class="logo-title-section text-center">
            <img class="site-logo" src="{{ config('sp.logo_url') }}" alt="">
            <h2>Welcome to Scribble<div>The last pen you’ll ever buy</div></h2>
        </div>

        @include('sp.commons.success_error')

        <form id="login-form" action="{{ route('user.login.post') }}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            <div class="form-group">
                <div class="checkbox icheck">
                    <label style="margin-left: 0px;">
                        <input type="checkbox" name="remember"> Remember Me
                    </label>
                </div>
            </div>

            <div class="form-group text-center">
                <input type="submit" value="Sign in" name="submit" class="login-btn">
                <p class="login-btn-text">Sign up for an account <a href="{{ route('user.signup') }}" class="signup-link">here.</a></p>
            </div>

        </form>

        @include('auth.partials.social_login')
        
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
@endsection
