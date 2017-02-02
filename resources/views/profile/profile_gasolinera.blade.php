@extends('layouts.templateGasolinera')
@section('title', 'Perfil de Usuario')
@section('content')
@include('profile.forms.modal')
@include('alerts.alertEditSuccess')

<div class="col-md-4 col-sm-12">
</div>

<div class="col-md-4 col-sm-12">
    @foreach($datos as $user)
        <div class="card card-primary">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title"><i class="fa fa-user"></i> Perfil de Usuario</div>
                                    </div>
                                    <div class="clear-both"></div>
                                </div>
                                <div class="card-body no-padding">
                                    <ul class="message-list">
                                        <a href="#">
                                            <li>
                                                <strong>Nombres:</strong>

                                                <div class="message-block">
                                                    
                                                    <div class="message pull-right">{{$user->nombreUsuario}}</div>
                                                </div>
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li>
                                                <strong>Apellidos:</strong>
                                                <div class="message-block">
                                                    <div class="message pull-right">{{$user->apellidoUsuario}}</div>
                                                </div>
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li>
                                                <strong>Teléfonos:</strong>
                                                <div class="message-block">
                                                    <div class="message pull-right">{{$user->telefonoUsuario}}</div>
                                                </div>
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li>
                                                <strong>Email:</strong>
                                                <div class="message-block">
                                                    
                                                    <div class="message pull-right">{{$user->email}}</div>
                                                </div>
                                            </li>
                                        </a>
                                        <a href="#" id="message-load-more"  onclick="Mostrar({{$user->idUsuario}})" data-target="#myModal" data-toggle="modal">
                                            <li class="text-center load-more red">
                                                <i class="fa fa-edit green"></i> Editar Datos
                                            </li>
                                        </a>
                                    </ul>
                                </div>
                            </div>
</div>
  @endforeach
<div class="col-md-4 col-sm-12">
</div>
                        
@endsection
  
@section('scripts')
      {!!Html::script('dist/js/profile.js')!!}
@endsection