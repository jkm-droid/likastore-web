@extends('base.login_register')

@section('content')
    <div class="register-box">
        <div class="register-logo">
            <a href="/"><b>Lika</b>Store</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
            @if ($message = Session::get('error'))
                <p class="alert alert-danger">{{ $message }}</p>
            @endif
            <form action="{{ route('user.register') }}" method="post">
                @csrf
                <div class="form-group has-feedback">
                    <input type="text" name="username" class="form-control" placeholder="Username" />
                    @if ($errors->has('username'))
                        <div class="text-danger form-text">{{ $errors->first('username') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control" placeholder="Full Name" />
                    @if ($errors->has('name'))
                        <div class="text-danger form-text">{{ $errors->first('name') }}</div>
                    @endif
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
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

                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div><!-- /.col -->
                </div>
            </form>

            <a href="{{ route('show.login') }}" class="text-center">I already have a membership</a>
        </div><!-- /.form-box -->
    </div>
@endsection
