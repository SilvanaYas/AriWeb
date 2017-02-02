@extends('layouts.templateFarmacia')
@section('title', 'Turnos')
@section('content')
@include('shift.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')


                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de Turnos</div>
                                    </div>
                                    <div class="pull-right">
                        <a class="btn btn-success" href="{!!URL::to('shift/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="reporteTurnos/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteTurnos/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="turnos">
                                        <thead>
                                            <tr>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
                                            <th>Desde</th>
                                            <th>Hasta</th>
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
    {!!Html::script('dist/js/turnos.js')!!}
    {!!Html::script('dist/js/clockpicker.js')!!}

<script type="text/javascript">
    var input = $('#horaFin');
    input.clockpicker({
    autoclose: true
    });
</script>

<script type="text/javascript">
    var input = $('#horaInicio');
    input.clockpicker({
    autoclose: true
    });
</script>


    <script>
  jQuery(function($) {       
    $( "#fechaFin" ).datepicker({
        format: 'yyyy/mm/dd',
        language: "es",
        autoclose: true,
        todayBtn: true
                }).on(
  'show', function() {          
    // Obtener valores actuales z-index de cada elemento
        var zIndexModal = $('#myModal').css('z-index');
        var zIndexFecha = $('.datepicker').css('z-index');

        // alert(zIndexModal + zIndexFEcha);

        // Re asignamos el valor z-index para mostrar sobre la ventana modal
        $('.datepicker').css('z-index',zIndexModal+1);
        });
    });
 </script>

 <script>
  jQuery(function($) {       
    $( "#fechaInicio" ).datepicker({
        format: 'yyyy/mm/dd',
        language: "es",
        autoclose: true,
        todayBtn: true
                }).on(
  'show', function() {          
    // Obtener valores actuales z-index de cada elemento
        var zIndexModal = $('#myModal').css('z-index');
        var zIndexFecha = $('.datepicker').css('z-index');

        // alert(zIndexModal + zIndexFEcha);

        // Re asignamos el valor z-index para mostrar sobre la ventana modal
        $('.datepicker').css('z-index',zIndexModal+1);
        });
    });
 </script>

@endsection