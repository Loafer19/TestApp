<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test-App</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/rocket.png') }}" type="image/x-icon">

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('welcome')}}"><b>Test</b>-App</a>
        </div>

        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <input type="hidden" name="remember" value="on">

                    <div class="input-group mb-3">
                        <input type="email" placeholder="Enter email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span> 
                        @endif
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" placeholder="Enter password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="col-12">
                        <br>
                        <a href="{{ route('password.request') }}">{{ __('I forgot my password?') }}</a>
                        <br>
                        <a href="{{ route('register') }}">{{ __('Register a new membership') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>