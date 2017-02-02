@extends('layouts.templateAdmin')
@section('title', 'Farmacias registradas')
@section('content')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

                                      
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de Farmacias Registradas</div>
                                    </div>
                                    <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="/reporteFarmacias/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="/reporteFarmacias/2"><i class="glyphicon glyphicon-download green"></i>Descarga Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="farmacias">
                                        <thead>
                                            <tr>
                                            <th>Propietario</th>
                                            <th>Email Propietario</th>
                                            <th>Empresa</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Estado</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection
@section('scripts')
<script>
     $(document).ready(function(){
                 Carga(); 
        });

        function Carga(){

           $('#farmacias').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "/api/farmacias/{{$id}}",
                    "language": {
                    "url": "/dist/js/spanish.js"
                    },
                    
                    "columns": 
                        [
                            {data: 'propietario', name: 'propietario'},
                            {data: 'email', name: 'email'},
                            {data: 'nombreSucursal', name: 'nombreSucursal'},
                            {data: 'direccion', name: 'direccion'},
                            {data: 'telefono', name: 'telefono'},
                            {data: 'activo', name: 'activo'},
                        ]
                }); 
                      //table.ajax.reload ();
        } 
</script>
@endsection