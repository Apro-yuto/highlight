<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>HighLight - Login</title>
        <link rel="stylesheet" href="{{asset('reset.css')}}">
    </head>
    <body class="login">
      @client
      @vite('resources/sass/login.scss')
      <div class="login_left">
        <div class="login_logo">
          <img src="{{ asset('logo.png')  }}">
        </div>
      </div>
      <div class="login_right">
        <div class="login_form">
          <div class="login_form_logo">
            <img src="{{ asset('logo_sp.png')  }}">
          </div>
          <form
            method="POST"
            action="{{ route('login') }}"
            class="login_form-container">
            @csrf

            <input
              class="login_email"
              name="email"
              placeholder="EMAIL"
              type="email">

            <input
              class="login_password"
              name="password"
              placeholder="PASSWORD"
              type="password">

            @error('password')
              <div>
                { $message }
              </div>
            @enderror

            <button
              type="submit"
              class="login_submit">LOGIN</button>
          </form>
        </div>
      </div>
    </body>
</html>

