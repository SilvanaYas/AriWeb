<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="html template, css, free, one page, gym, fitness, web design" />
   
    <meta name="msapplication-TileColor" content="#00a8ff">
    <meta name="theme-color" content="#ffffff">
        {!!Html::style('dist/ari/css/normalize.css')!!}
        {!!Html::style('dist/ari/css/bootstrap.css')!!}
        {!!Html::style('dist/ari/css/owl.css')!!}
        {!!Html::style('dist/ari/css/animate.css')!!}

        {!!Html::style('dist/ari/fonts/font-awesome-4.1.0/css/font-awesome.min.css')!!}
        {!!Html::style('dist/ari/fonts/eleganticons/et-icons.css')!!}
        {!!Html::style('dist/ari/css/cardio.css')!!}
        {!!Html::style('dist/css/jquery-ui.min.css')!!}
        {!!Html::style('dist/css/ari.css')!!}

</head>

<body>
    <div class="preloader">
        <img src="dist/ari/img/loader.gif" alt="Preloader image">
    </div>
    <nav class="navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="img/scpms.png" data-active-url="img/sscpm.png" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right main-nav">
                    <li><a href="#services">Bancos</a></li>
                    <li><a href="#team">Farmacias</a></li>
                    <li><a href="#pricing">Gasolineras</a></li>
                    <li><a href="#pricing">Medicamentos</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modal1" class="btn btn-blue">Ingresar</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    
                    @yield('content')    
    <footer>
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
    <!-- Holder for mobile navigation -->
    <div class="mobile-nav">
        <ul>
        </ul>
        <a href="#" class="close-link"><i class="arrow_up"></i></a>
    </div>
    <!-- Scripts -->
    {!!Html::script('dist/ari/js/jquery-1.11.1.min.js')!!}
    {!!Html::script('dist/ari/js/owl.carousel.min.js')!!}
    {!!Html::script('dist/ari/js/bootstrap.min.js')!!}
    {!!Html::script('dist/ari/js/wow.min.js')!!}
    {!!Html::script('dist/ari/js/typewriter.js')!!}
    {!!Html::script('dist/ari/js/jquery.onepagenav.js')!!}
    {!!Html::script('dist/ari/js/main.js')!!}
    <!--rEVISASR SI NO SE DAÑO AL AÑADIR LA LIBRERIA ENVEZ DE LA URL FALTA COMPRIMIRLA-->
    {!!Html::script('dist/lib/js/jquery-ui.min.js')!!}
    <!--INLCLUIDOS EN CADA SECCION-->
    @section('scripts')
    @show
</body>

</html>
