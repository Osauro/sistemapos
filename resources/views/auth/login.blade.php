@extends('auth.app', ['title' => 'Entrar'])
@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Entrar
    </span>
    @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('email') }}
        </div>
    @endif
    @if ($errors->has('password'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('password') }}
        </div>
    @endif
    <div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-danger' : '' }}" data-validate = "Valid email is required: ex@abc.xyz">
        <input type="email" name="email" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Correo electrónico</span>
    </div>
    <div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-danger' : '' }}"" data-validate="Password is required">
        <input class="input100" type="password" name="password" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Contraseña</span>
    </div>
    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
            <label class="label-checkbox100" for="ckb1">
                Recuerdame
            </label>
        </div>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Entrar
        </button>
    </div>
</form>
@endsection
