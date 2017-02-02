<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
	<link rel="stylesheet" href="">
</head>
<body>
	<div class="banner"></div>
	<p> Hola {{$data['nombreUsuario']}} {{$data['apellidoUsuario']}} tu cuenta ha sido creada con éxito, para activarla sigue el enlace enviado</p>
	<p>Tu contraseña creada es la siguiente por favor actualizala al ingresar a la Aplicación:</p>
	<strong><p>{{$data['password']}}</p></strong>
	<a href="{{url()}}/auth/confirm/email/{{$data['email']}}/confirm_token/{{$data['confirm_token']}}">Confirma tu cuenta en el siguiente enlace</a>
</body>
</html>