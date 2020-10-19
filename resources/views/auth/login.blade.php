@extends('layouts.loginlayout')

@section('content')


  <!-- Main content -->
  <div class="content-wrapper">
    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

      <!-- Login form -->
      <form method="POST" class="login-form" action="{{ route('login') }}">
        @csrf

        <div class="card mb-0">
          <div class="card-body">
            <div class="text-center mb-3">
              <i class="fas fa-3x fa-border fa-sign-in-alt"></i>
              <h5 class="mb-0">Ingresa a tu Cuenta</h5>
              <span class="d-block text-muted">Ingresa tus Datos</span>
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
              <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Usuario" required autofocus>
              <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
              </div>
              @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('username') }}</strong>
                  </span>
              @endif
            </div>

            <div class="form-group form-group-feedback form-group-feedback-left">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>
              <div class="form-control-feedback">
                <i class="icon-lock2 text-muted">@if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif</i>
              </div>

            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }} <i class="icon-circle-right2 ml-2"></i></button>
            </div>

            <div class="text-center">
              @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
          </div>
        </div>
      </form>
      <!-- /login form -->

    </div>
    <!-- /content area -->
  </div>
@endsection
