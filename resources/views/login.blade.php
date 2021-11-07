<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HighLight - Login</title>
        <link rel="stylesheet" href="{{asset('reset.css')}}">
        @vite('resources/sass/login.scss')
    </head>
    <body class="login">
      <div class="login_left">
        <div class="login_logo">
          <img src="{{ asset('logo.png')  }}">
        </div>
      </div>
      <div class="login_right">
        <div class="login_form">
          <form class="login_form-container">
            <input class="login_email" placeholder="EMAIL" type="email">
            <input class="login_password" placeholder="PASSWORD" type="password">

            @error('password')
              <div>
                { $message }
              </div>
            @enderror

            <button class="login_submit">LOGIN</button>
          </form>
        </div>
      </div>
    </body>
</html>

