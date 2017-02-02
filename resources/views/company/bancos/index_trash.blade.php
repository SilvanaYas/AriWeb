@extends('layouts.templateBanco')
 @section('title', 'Socios en estado inactivo')
@section('content')
@include('company.forms.modal')
@include('alerts.alertBaja')
@include('alerts.alertHabilitar')

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
                                    <div class="title">Socios dados de Baja</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="socio">
                                        <thead>
                                            <tr>
                                            <th>Representante</th>
                                            <th>Apellidos</th>
                                            <th>Teléfono</th>
                                            <th>Email</th>
                                            <th>Eliminado en</th>
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
    {!!Html::script('dist/js/trashSocios.js')!!}
@endsection
