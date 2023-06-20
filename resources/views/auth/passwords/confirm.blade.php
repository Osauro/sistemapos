@extends('auth.app', ['title' => '2do Factor'])

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Confirmar contraseña
    </span>
    @error('password')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
    <div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-danger' : '' }}">
        <input type="password" name="password" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Contraseña</span>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Confirmar
        </button>
    </div>
    <div class="text-center mt-3 mb-3">
        -O-
    </div>
    <div class="text-center">
        <a href="{{ route('password.request') }}">
            Recuperar contraseña?
        </a>
    </div>
</form>
@endsection
