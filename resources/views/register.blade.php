<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
        <link rel="stylesheet" href="{{URL::asset('css/style.css')}}">
        <script src="{{URL::asset('js/jquery-3.3.1.min.js')}}"></script>

        <title>Register</title>
        <style>
            .login-modal {
                box-shadow: 0px 0px 6px rgba(0,0,0,0.5);
                padding: 10px;
                box-sizing: border-box;
                width: 460px;
                height: auto;
                margin: auto;
                position: relative;
                overflow: auto;
                background: white;
            }

            .error {
                display: block;
                color: red;
                padding-left: 5px;
                font-size: 0.75em;
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
            <form action="" method="post">
                {{csrf_field()}}
                <div class="input-group">
                    <label for="username">Username</label>
                    <span class="error uppercase"></span>
                    <input type="text" name="username" placeholder="">
                </div>
                <div class="input-group">
                    <label for="email">E-Mail</label>
                    <span class="error uppercase"></span>
                    <input type="email" name="email" placeholder="">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <span class="error uppercase"></span>
                    <input type="password" name="password" placeholder="">
                </div>
                <div class="input-group">
                    <label for="password-confirm">Confirm Password</label>
                    <span class="error uppercase"></span>
                    <input type="password" name="password-confirm" placeholder="">
                </div>
                <span id="error"></span>
                <div class="input-group">
                    <input type="submit" value="Register" style="width: 100%;">
                </div>
            </form>
            <br>
            <a href="/login" style="float: right;">Already have an account?</a>
            <br>
            <br>
        </div>
    </body>
</html>
