@extends('auth.app', ['title' => 'Cambiar contraseña'])

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('password.update') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <span class="login100-form-title p-b-43">
        Cambiar contraseña
    </span>
    <input type="hidden" name="token" value="{{ $token }}">
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    @if ($errors->has('password'))
        <div class="alert alert-danger">
            {{ $errors->first('password') }}
        </div>
    @endif
    @if ($errors->has('password_confirmation'))
        <div class="alert alert-danger">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
    <div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-danger' : '' }}">
        <input type="email" name="email" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Correo electrónico</span>
    </div>
    <div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-danger' : '' }}">
        <input type="password" name="password" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Contraseña</span>
    </div>
    <div class="wrap-input100 validate-input{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
        <input type="password" name="password_confirmation" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Contraseña</span>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Cambiar contraseña
        </button>
    </div>
    <div class="text-center mt-3 mb-3">
        -O-
    </div>
    <div class="text-center">
        <a href="{{ route('login') }}">
            Iniciar sesión?
        </a>
    </div>
</form>
@endsection
