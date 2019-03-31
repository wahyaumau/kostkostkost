@extends('layouts.app')

@section('content')
<div class="auth">
  <div class="container">
    <div class="auth__inner">
      <div class="auth__media">
        <img src="{{url('site-assets/images/undraw_selfie.svg')}}">
      </div>
      <div class="auth__auth">
        <h1 class="auth__title">Access your account</h1>
        <p>Fill in your email and password to proceed</p>
        <form method="POST" action="{{ route('kostariateam.login.submit') }}" autocompelete="new-password" role="presentation" class="form">
          @csrf
          <input name="email" class="fakefield">
          <label>Email</label>
          <input type="text" name="email" id='email' placeholder="you@example.com">
          <label>Password</label>
          <input type="password" name="password" id='password' placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;" autocomplete="off">
          <button type='submit' class="button button__accent">Log in</button>
          <a href=""><h6 class="left-align" >Forgot your password?</h6></a>
        </form>
      </div>
    </div>
  </div>
</div>
<!--
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Kostaria Team Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('kostariateam.login.submit') }}">
            @csrf

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('kostariateam.password.request'))
                <a class="btn btn-link" href="{{ route('kostariateam.password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div> -->
@endsection
