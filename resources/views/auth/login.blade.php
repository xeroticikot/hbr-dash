<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upboard - Login | Hamptons Boat Rental</title>
    <link href="{{ asset('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('public/assets/css/styles.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('public/assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset('public/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <h3 class="text-center get-logo-text"><span>Hamptons Boat Rental</span> - Upboard</h3>
            <div class="login-panel panel bottom-panel panel-default">
                <div class="panel-heading">Log in</div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-info btn-offer">Login</button>
                            <a href="{{ url('/login') }}" class="btn btn-info btn-offer">Cancel</a>
                            <div class="clearfix"></div>
                            <a href="{{ route('password.request') }}" class="text-center forget-admin">Forget Password</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div>


<script src="{{ asset('public/assets/js/jquery-1.11.1.min.js') }}"></script>
<script src="{{ asset('public/assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
