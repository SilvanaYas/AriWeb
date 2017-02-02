@extends('layouts.templateGasolinera')
 @section('title', 'Inicio')
@section('content')
@include('company.forms.modal')
@include('alerts.alertEditSuccess')
@include('alerts.alertDelete')

@if(Session:: has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

        @foreach ($perfil as $data)         
      <div class="row">
          <div class="col-xs-12 col-sm-12">
                <div class="navbar-inner breadcrumb">          
                    <span class="navbar-brand">{{$data->nombreEmpresa}}</span>    

                    <ul class="collapse navbar-collapse nav navbar-nav top-menu">
                        <li>{!!link_to_route('company.edit', $title = 'Editar datos', $parameters = $data->id, $attributes = ['class'=>'text-danger'])!!}</li>                    
                    </ul>
                </div>
            </div>
        </div>
      @endforeach            

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                    <div class="title">Lista de Socios Registrados</div>
                                    </div>
                                    <div class="pull-right">
                        <a class="btn btn-success" href="{!!URL::to('admincompany/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="reporteEmpresa/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteEmpresa/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="socios">
                                        <thead>
                                            <tr>
                                            <th>Representante</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
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
    {!!Html::script('dist/js/socios.js')!!}
@endsection
