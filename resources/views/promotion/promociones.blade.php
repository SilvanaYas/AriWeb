@extends('layouts.templateGasolinera')
@section('title', 'Listado de promociones')
@section('content')
@include('promotion.forms.modal1')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')

        
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de promociones</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="promos">
                                        <thead>
                                            <tr>
                                            <th>Producto</th>
                                            <th>Promoción</th>
                                            <th>Descripción</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Fin</th>
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
    {!!Html::script('dist/js/listaPromociones.js')!!}
     <script>
  jQuery(function($) {       
    $( "#fechaInicioPromo" ).datepicker({
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
    $( "#fechaFinPromo" ).datepicker({
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