<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=0">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>

    <!-- CSS Libs -->
        {!!Html::style('dist/lib/css/bootstrap.min.css')!!}
        <!-- CSS App -->
        {!!Html::style('dist/css/style.min.css')!!}
        {!!Html::style('dist/css/scpm.css')!!}
        {!!Html::style('dist/css/login.min.css')!!}
        <!--ESTA URL DEBEMOS REEMPLARLA POR EL ARCHIVO YA COMPRIMIDO-->
        {!!Html::style('dist/css/jquery-ui.min.css')!!}
        {!!Html::style('dist/css/1-col-portfolio.min.css')!!}
        {!!Html::style('dist/Inicio/fonts/font-awesome-4.1.0/css/font-awesome.min.css')!!}
        {!!Html::style('dist/Inicio/fonts/eleganticons/et-icons.css')!!}

</head>

<body class="contenido">
<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/"><img src="/img/scpms.png" alt="" class="navbar-brand"></a>
                <a class="navbar-brand" href="/">ARI WEB</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav pull-right">
                    
                    <li>
                        <a href="http://www.scpm.gob.ec/">Portal SCPM</a>
                    </li>
                    <li>
                        {!!link_to('log', $title = 'Ingresar', $attributes = ['class'=>''],$secure = null)!!}
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    
    <div class="principal">
            <div class="row"></div>
                @yield('content')
        </div>
        <footer class="foot">
        <div class="container">
            <div class="">
                <div class="col-sm-8">
                <p><img src="/img/icons/Unl.png"><a href="http://unl.edu.ec/">&nbsp;&nbsp;&nbsp;Universidad Nacional de Loja</a>&nbsp;&nbsp;Convenio 2016 - 2017&nbsp;&nbsp;<a href="http://www.scpm.gob.ec/">SCPM</a></p>
                    <p>&copy; 2016 All Rights Reserved.</p>
                </div>
                <div class="col-sm-4 text-right text-center-mobile">
                    <ul class="social-footer">
                        <li><a href="https://www.facebook.com/Superintendencia-de-Control-de-Poder-de-Mercado-194304300919607/?fref=ts"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/AntiMonopolioEC"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/user/SCPMEcuador"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    {!!Html::script('dist/js/jquery.2.1.1.min.js')!!}
    <!--rEVISASR SI NO SE DAÑO AL AÑADIR LA LIBRERIA ENVEZ DE LA URL FALTA COMPRIMIRLA-->
    {!!Html::script('dist/lib/js/jquery-ui.min.js')!!}
    {!!Html::script('dist/lib/js/bootstrap.min.js')!!}

    <!--INLCLUIDOS EN CADA SECCION-->
    @section('scripts')
    @show

</body>

</html>
