<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{ $title }} | {{ env('APP_NAME') }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('storage') }}/favicon.png">
    <link rel="icon" type="image/png" href="{{ asset('storage') }}/favicon.png">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!-- METATAGS -->
    <meta name="title" content="Paybol.net">
    <meta name="description" content="Compra, vende e intercambia saldos de billeteras electrónicas a la velocidad de la luz, ahora con Paybol te damos la oportunidad de efectivizar tu saldo directamente a tu cuenta bancaria en pocos minutos.">
    <meta name="keywords" content="Comprar, Vender, Intercambiar, Skril, Nateller, Uphold, Advcash, Payeer, Perfect Money, AirTM, Payoneer, Skril Mastercard, Paypal">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Spanish">
    <meta name="author" content="DieguitoSoft">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="og:title" content="Paybol.net">
    <meta property="og:url" content="https://www.paybol.net">
    <meta property="og:image" content="https://www.paybol.net/storage/banner.jpg">
    <meta property="og:description" content="Compra, vende e intercambia saldos de billeteras electrónicas a la velocidad de la luz, ahora con Paybol te damos la oportunidad de efectivizar tu saldo directamente a tu cuenta bancaria en pocos minutos.">
    <!--     Fonts and icons     -->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('auth') }}/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				@yield('content')
				<div class="login100-more" style="background-image: url('/auth/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{ asset('auth') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{ asset('auth') }}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('auth') }}/js/main.js"></script>

</body>
</html>
