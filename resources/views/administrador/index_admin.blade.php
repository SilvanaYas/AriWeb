@extends('layouts.templateAdmin')
@section('title', 'Inicio')
@section('content')
@include('administrador.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

@if(Session:: has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de Administradores AWOPEC</div>
                                    </div>
                                    <div class="pull-right"> <a class="btn btn-success" href="{!!URL::to('admin/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="reporteAdmin/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteAdmin/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="admins">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>                                            
                                                <th>Apellidos</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Perfil</th>
                                                <th>Estado</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
  
@section('scripts')
    {!!Html::script('dist/js/admins.js')!!}
@endsection