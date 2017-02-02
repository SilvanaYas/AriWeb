@extends('layouts.templateFarmacia')
@section('title', 'Horarios')
@section('content')
@include('schedule.forms.modal')
@include('alerts.alertDelete')
@include('alerts.alertEditSuccess')
                                   

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">

                                    <div class="card-title">
                                    <div class="title">Lista de Horarios</div>
                                    </div>
                                    <div class="pull-right">
                        <a class="btn btn-success" href="{!!URL::to('schedule/create')!!}"><i class="glyphicon glyphicon-plus"></i>Agregar</a>
                                      </div>
                                </div>
                                <div class="card-body">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered hover" id="horarios">
                                        <thead>
                                            <tr>
                                            <th>Descripción</th>
                                            <th>De</th>
                                            <th>Hasta</th>
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
    {!!Html::script('dist/js/horarios.js')!!}
    {!!Html::script('dist/js/clockpicker.js')!!}
    <script type="text/javascript">
        var input = $('#horaInicioHorario');
        input.clockpicker({
        autoclose: true
     });
    </script>

    <script type="text/javascript">
        var input = $('#horaFinHorario');
        input.clockpicker({
        autoclose: true
        });
    </script>
@endsection


