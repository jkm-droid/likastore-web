@extends('base.login_register')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Lika</b>Store</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Reset your password</p>
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{ $message }}</p>
            @endif
            <form action="{{ route('user.reset_pass') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Email" />
                    @if ($errors->has('email'))
                        <div class="text-danger form-text">{{ $errors->first('email') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" />
                    @if ($errors->has('password'))
                        <div class="text-danger form-text">{{ $errors->first('password') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password_confirm" class="form-control" placeholder="Password Confirm" />
                    @if ($errors->has('password_confirm'))
                        <div class="text-danger form-text">{{ $errors->first('password_confirm') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Reset My Password</button>
                    </div><!-- /.col -->
                </div>
            </form>
        </div><!-- /.form-box -->
    </div>
@endsection
