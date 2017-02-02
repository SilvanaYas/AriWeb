@extends('layouts.templateAdmin')
@section('title', 'Usuarios Inactivos')
@section('content')
@include('alerts.alertBaja')
@include('alerts.alertHabilitar')

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Usuarios en estado Inactivo</div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="user">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>                
                                                <th>Apellidos</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Perfil</th>
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
    {!!Html::script('dist/js/trashUser.js')!!}
@endsection