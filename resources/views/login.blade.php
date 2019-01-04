<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>

        <title>Login</title>
        <style>
            .login-modal {
                box-shadow: 0px 0px 6px rgba(0,0,0,0.5);
                padding: 10px;
                box-sizing: border-box;
                width: 360px;
                height: auto;
                margin: auto;
                position: relative;
                top: 40px;
                overflow: auto;
                background: white;
            }

            #error {
                display: block;
                color: red;
                padding-left: 15px;
            }

            body {
                background-repeat: repeat;
                background-image: url('../res/login-background.jpg');
            }
        </style>
    </head>
    <body>
        <div class="login-modal" id="login-modal">
            <div class="wrap" style="display: flex; justify-content: center; align-items: center; padding: 0px 40px;">
                <span id="logo" style="display: inline-block; flex: 1;"></span>
            </div>
            <br>
            <form action="{{route('dologin')}}" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="">
                </div>
                @if ($errors->has('email'))
                    <span id="error" style="transform: translateY(-10px)">{{ $errors->first('email') }}</span>
                @endif
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="">
                </div>
                @if ($errors->has('password'))
                    <span id="error" style="transform: translateY(-10px)">{{ $errors->first('password') }}</span>
                @endif
                @if ($errors->has('InvalidCredential'))
                    <span id="error">{{ $errors->first('InvalidCredential') }}</span>
                @endif
                <div class="input-group">
                    <input type="submit" value="Log In" style="width: 100%;">
                </div>
            </form>
            <br>
                <a href="{{route('register')}}" style="float: right;">Don't have an account yet?</a>
            <br>
            <br>
        </div>
    </body>
</html>
