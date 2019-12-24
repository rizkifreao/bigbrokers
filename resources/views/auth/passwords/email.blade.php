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
    </head>
    <body style="background-color: rgb(235, 235, 235);">
        <div class="login-wrapper fadeInDown animated">
            <form method="POST" action="{{ route('password.email') }}" class="lobi-form login-form visible">
                @csrf
                <div class="login-header">
                    Forgot your password?
                </div>
                <div class="login-body">
                    <fieldset>
                        <div class="form-group">
                            <label>username</label>
                            <label class="input">
                                <span class="input-icon input-icon-prepend fa fa-envelope"></span>
                                <span class="input-icon input-icon-append fa fa-user"></span>
                                <input type="email" name="email" placeholder="Email or username" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <span class="tooltip tooltip-bottom-right">Type the email or username used for registration</span>
                            </label>
                            <button type="button" class="btn-link btn-sign-in">Remember your password?</button>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 text-right">
                                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-refresh"></i> Restore password</button>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>
            <!--Forgot password form-->
            <form action class="lobi-form pass-forgot-form">

            </form>
        </div>

    </body>
</html>
