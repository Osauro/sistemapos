@extends('auth.app', ['title' => '2do Factor de Autenticación'])

@section('content')
<form class="login100-form" method="POST" action="{{ route('two-factor.login') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Código de acceso
    </span>
    @error('code')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
    @error('recovery_code')
        <span class="invalid-feedback" role="alert">
            {{ $message }}
        </span>
    @enderror
    <div class="wrap-input100">
        <input id="code" type="code" class="input100" name="code" required autofocus>
        <span class="focus-input100"></span>
        <span class="label-input100">Código de acceso</span>
    </div>
    <div class="container-login100-form-btn">
        <button class="login100-form-btn">
            Confirmar
        </button>
    </div>
    <div class="mt-3 mb-3 text-center">
        - o -
    </div>
    <div class="text-center"><a href="https://wa.link/43y1b7"><i class="fa fa-whatsapp"></i> Remover 2FA</a></div>
</form>
@endsection
