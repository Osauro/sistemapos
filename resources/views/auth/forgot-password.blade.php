@extends('auth.app', ['title' => 'Recuperar contraseña'])

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Recuperar contraseña
    </span>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($errors->has('email'))
        <div class="alert alert-danger">
            {{ $errors->first('email') }}
        </div>
    @endif
    <div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-danger' : '' }}" data-validate = "Valid email is required: ex@abc.xyz">
        <input type="email" name="email" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Correo electrónico</span>
    </div>
    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <a href="{{ route('login') }}" class="txt1">
                Iniciar sesión?
            </a>
        </div>
        <div>
            <a href="{{ route('register') }}" class="txt1">
                Crear cuenta?
            </a>
        </div>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Recuperar contraseña
        </button>
    </div>
    <div class="text-center mt-3 mb-3">
        -o-
    </div>
    <div class="row justify-content-center">
        <a href="https://wa.link/cdayno" target="new">Contactar a soporte?</a>
    </div>
</form>
@endsection
