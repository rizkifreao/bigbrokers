<!DOCTYPE html>
<!--Author     : @arboshiki-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Login to LobiAdmin</title>
        <link rel="shortcut icon" href="{{asset('img/logo/lobiadmin-logo-16.ico')}}" />
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('css/login.css')}}"/>
    </head>
    <body style="background-color: rgb(235, 235, 235);">
        <div class="login-wrapper fadeInDown animated">
            <form method="POST" action="{{ route('password.request') }}" class="lobi-form login-form visible">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Reset Password
                        </button>
                    </div>
                </div>
            </form>
            <!--Forgot password form-->
            <form action class="lobi-form pass-forgot-form">

            </form>
        </div>


        <script type="text/javascript" src="{{asset('js/lib/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
            $('.login-wrapper').ready(function(){
                // $('.login-form').submit(function(){
                //     window.location.href = window.location.href+"/../";
                //     return false;
                // });
                // $('.signup-form').submit(function(){
                //     return false;
                // });
                // $('.pass-forgot-form').submit(function(){
                //     return false;
                // });
            });
            $('.btn-forgot-password').click(function(ev){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.pass-forgot-form').addClass('visible');
            });
            $('.btn-sign-in').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.login-form').addClass('visible');
            });
            $('.btn-sign-up').click(function(){
                var $form = $(this).closest('form');
                $form.removeClass('visible');
                $form.parent().find('.signup-form').addClass('visible');
            });
        </script>
    </body>
</html>
