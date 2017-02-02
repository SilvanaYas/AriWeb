<!DOCTYPE html>
<html lang="es">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
    <!-- CSS Libs -->
    {!!Html::style('dist/lib/css/bootstrap.min.css')!!}
    {!!Html::style('dist/lib/css/font-awesome.min.css')!!}
    {!!Html::style('dist/lib/css/animate.min.css')!!}
    {!!Html::style('dist/lib/css/bootstrap-switch.min.css')!!}
    {!!Html::style('dist/lib/css/checkbox3.min.css')!!}
    {!!Html::style('dist/lib/css/jquery.dataTables.min.css')!!}
    {!!Html::style('dist/lib/css/dataTables.bootstrap.min.css')!!}
    {!!Html::style('dist/lib/css/select2.min.css')!!}
    {!!Html::style('dist/css/clockpicker.min.css')!!}
    
    <!-- CSS App -->
    {!!Html::style('dist/css/style.min.css')!!}
    {!!Html::style('dist/css/scpm.min.css')!!}
    {!!Html::style('dist/css/themes/flat-blue.min.css')!!}
    {!!Html::style('dist/css/datepicker.min.css')!!}
    {!!Html::style('dist/lib/css/select2.min.css')!!}

    <!-- CSS App --> 

</head>

<body class="flat-blue">
    <div class="app-container">
        <div class="row content-container">
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li>Inicio</li>
                            <li class="active">Principal</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-times icon"></i>
                        </button>
                       
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{!!Auth::user()->nombreUsuario!!}<span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="/img/default.png">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">{!!Auth::user()->nombreUsuario!!}</h4>
                                        <p>{!!Auth::user()->email!!}</p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                           <a href="/profile"><button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button></a>
                                            <a href="/logout">
                                            <button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> Logout</button></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="/company">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">ADMINISTACION</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            @if(Auth::user()->idRol == 2)
                            
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-form">
                                    <span class="icon fa fa-users"></span><span class="title">Socios</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-form" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{!!URL::to('/company')!!}"><span class="icon fa fa-chevron-circle-right"></span><span class="title">Socios</span></a>
                                            </li>
                                            <li><a href="{!!URL::to('/operadoresTrash')!!}"><span class="icon fa fa-chevron-circle-right"></span><span class="title">Socios dedos de BAJA</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                    
                            <li>
                                <a href="{!!URL::to('adminbranch')!!}">
                                    <span class="icon fa fa-institution"></span><span class="title">Sucursales</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!!URL::to('product')!!}">
                                    <span class="icon fa fa-leaf"></span><span class="title">Productos</span>
                                </a>
                            </li>
                            @else
                            <li>
                                <a href="{!!URL::to('branch')!!}">
                                    <span class="icon fa fa-home"></span><span class="title">Principal</span>
                                </a>
                            </li>
                             
                            <li>
                                <a href="{!!URL::to('schedule')!!}">
                                    <span class="icon fa fa-calendar"></span><span class="title">Horarios</span>
                                </a>
                            </li>
                            <li>
                                <a href="{!!URL::to('shift')!!}">
                                    <span class="icon fa fa-newspaper-o"></span><span class="title">Turnos</span>
                                </a>
                            </li>

                        <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-element">
                                    <span class="icon fa fa-leaf"></span><span class="title">Productos</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-element" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{!!URL::to('stock')!!}"><span class="icon fa fa-chevron-circle-right"></span><span class="title">Stock General</span></a>
                                            </li>
                                            <li><a href="{!!URL::to('products')!!}"><span class="icon fa fa-chevron-circle-right"></span><span class="title">Mi Stock de Productos</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endif             
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    @yield('content')

                </div>
            </div>
        </div>
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">2.1 <a href="#"><i class="fa fa-long-arrow-up"></i></a></span> © All the rigth reserved to CIS | UNL.
            </div>
        </footer>
    <div>
    <!-- Javascript Libs -->
    {!!Html::script('dist/lib/js/jquery.min.js')!!}
    {!!Html::script('dist/lib/js/bootstrap.min.js')!!}
    {!!Html::script('dist/lib/js/Chart.min.js')!!}
    {!!Html::script('dist/lib/js/bootstrap-switch.min.js')!!}
    {!!Html::script('dist/lib/js/jquery.matchHeight-min.js')!!}
    {!!Html::script('dist/lib/js/jquery.dataTables.min.js')!!}
    {!!Html::script('dist/lib/js/dataTables.bootstrap.min.js')!!}
    {!!Html::script('dist/lib/js/select2.full.min.js')!!}
    {!!Html::script('dist/lib/js/ace/ace.js')!!}
    {!!Html::script('dist/lib/js/ace/mode-html.js')!!}
    {!!Html::script('dist/lib/js/ace/theme-github.js')!!}
    {!!Html::script('dist/js/bootstrap-datepicker.js')!!}
  
   <!-- Javascript Libs -->
    {!!Html::script('dist/js/app.js')!!}

    <!--INLCLUIDOS EN CADA SECCION-->
    @section('scripts')
    @show
</body>

</html>
