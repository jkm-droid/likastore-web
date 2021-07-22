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

            <form action="{{ route('user.forgot_submit') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" />
                    @if ($errors->has('email'))
                        <div class="text-danger form-text">{{ $errors->first('email') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Request Password Reset</button>
                    </div><!-- /.col -->
                </div>
            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

@endsection
