@extends('auth.app', ['title' => 'Verificación'])

@section('content')
<form class="login100-form validate-form" method="POST" action="{{ route('verification.send') }}">
    @csrf
    <span class="login100-form-title p-b-43">
        Verificación
    </span>
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            Un nuevo enlace de verificación fue enviado.
        </div>
    @endif
    Busca el enlace de veriicación en la bandeja de entrada del correo electrónico usado al registrarte en la plataorma,
    si no lo encuentras busca en correo no deseado o puedes solicitar un nuevo enlace.
    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Aquí') }}</button>.
</form>
@endsection
