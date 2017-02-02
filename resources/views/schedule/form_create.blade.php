@extends('layouts.templateFarmacia')
@section('title', 'Registro de Horario')
    @section('content')
    @include('alerts.alertError') 

    <div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Registro de Horarios</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::open(['class'=>'form-horizontal','id'=>'form_horario'])!!}
                            
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">

                                    @include ('schedule.forms.schedule')
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('schedule', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
                                             {!!link_to('#', $title ='Registrar', $attributes = ['id'=>'registro', 'class'=>'btn btn-primary'], $secure = null)!!}
                                            </div>
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
        </div>
</div>

@endsection

@section('scripts')
{!!Html::script('dist/js/schedule.js')!!}
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