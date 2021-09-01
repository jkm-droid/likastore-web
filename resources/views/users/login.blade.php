@extends('base.login_register')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Lika</b>Store</a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>
            @if ($message = Session::get('success'))
                <p class="alert alert-success">{{ $message }}</p>
            @endif
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{ $message }}</p>
            @endif

            <form action="{{ route('user.login') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Username or Email" />
                    @if ($errors->has('username'))
                        <div class="text-danger form-text">{{ $errors->first('username') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Password" />
                    @if ($errors->has('password'))
                        <div class="text-danger form-text">{{ $errors->first('password') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck ">
                            <label>
                                <input name="remember_me" class="ml-3" type="checkbox"> Remember Me
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="{{ route('user.forgot_pass') }}">I forgot my password</a><br>
{{--            <a href="{{ route('show.register') }}" class="text-center">Register a new membership</a>--}}

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
