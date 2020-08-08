@extends('layouts.app', ['activePage' => 'login', 'titlePage' => __('Login')])

@section('estilos')
<link rel="stylesheet" href="{{asset('css')}}/login.css">
@endsection

@section('content')
<div class="envoltura fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
  
      <!-- Icon -->
      <div class="fadeIn first">
        <img src="images/logo.png" id="icon" alt="Logo" class="mt-2 mb-2" />
      </div>
  
      <!-- Login Form -->
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="fadeIn second @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <input id="password" type="password" class="fadeIn third @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group row">
            <div class="col-md-6 offset-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>
        <input type="submit" class="fadeIn fourth" value="Ingresar">
      </form>
  
      <!-- Remind Passowrd -->
      <div id="formFooter">
        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
      </div>
  
    </div>
  </div>
  
@endsection
