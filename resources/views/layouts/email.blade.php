<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
	<link rel="stylesheet" href="">

		{!!Html::style('dist/assets/bootstrap.min.css')!!}
		{!!Html::style('dist/assets/font-awesome.min.css')!!}
        {!!Html::style('dist/lib/css/bootstrap.min.css')!!}
        {!!Html::style('dist/css/scpm.min.css')!!}
        {!!Html::style('dist/css/login.min.css')!!}

</head>
<body>
	
		<div class="container">
			<div class="blue">
            		@yield('content')
        		</div>

		</div>
</body>
</html>

