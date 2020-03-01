@extends('layouts.app')
    @section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V3</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('/')}}/LoginPanle/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}/LoginPanle/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('/')}}/LoginPanle/images/bg-01.jpg');">
        <div class="wrap-login100">
            <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                @csrf
					<span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span>

                <span class="login100-form-title p-b-34 p-t-27">
						Login
					</span>

                <div class="wrap-input100 validate-input" data-validate = "Enter email">
                    <input class="input100" type="text" name="email" placeholder="email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                </div>

                <div class="contact100-form-checkbox">
                    <input class=" input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="label-checkbox100" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center p-t-50">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/bootstrap/js/popper.js"></script>
<script src="{{asset('/')}}/LoginPanle/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/daterangepicker/moment.min.js"></script>
<script src="{{asset('/')}}/LoginPanle/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="{{asset('/')}}/LoginPanle/js/main.js"></script>

</body>
</html>
@endsection
