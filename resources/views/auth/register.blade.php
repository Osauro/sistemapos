@extends('auth.app', ['title' => 'Registro'])

@section('content')
<form class="login100-form pt-5 validate-form" method="POST" action="{{ route('register') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Registro
    </span>
    @if ($errors->has('name'))
        <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
            {{ $errors->first('name') }}
        </div>
    @endif
    @if ($errors->has('email'))
    <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
        {{ $errors->first('email') }}
    </div>
    @endif
    @if ($errors->has('password'))
        <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
            {{ $errors->first('password') }}
        </div>
    @endif
    @if ($errors->has('password_confirmation'))
        <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
            {{ $errors->first('password_confirmation') }}
        </div>
    @endif
    <div class="wrap-input100 validate-input{{ $errors->has('name') ? ' has-danger' : '' }}">
        <input type="name" name="name" class="input100" required>
        <span class="focus-input100"></span>
        <span class="label-input100">Nombre de usuario</span>
    </div>
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
    <input type="hidden" name="ref_id" value="{{ app('request')->input('ref') }}">
    <div class="flex-sb-m w-full p-t-3 p-b-32">
        <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="policy">
            <label class="label-checkbox100" for="ckb1">
                {{ __('Acepto los ') }} <a href="#"> términos y condiciones</a>
            </label>
        </div>
        <div>
            <a href="{{ route('login') }}" class="txt1">
                Tienes una cuenta?
            </a>
        </div>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Registro
        </button>
    </div>
</form>
@endsection
