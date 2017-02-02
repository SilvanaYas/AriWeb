@extends('layouts.templateAdmin')
@section('title', 'Registro de tipo de productos')
	@section('content')
    @include('alerts.alertError')
    @include('alerts.alertSuccess')



<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Datos agregado correctamente.</strong>
    </div>
<div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Nuevo Registro</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::open(['class'=>'form-horizontal'])!!}
                    
                                     <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        
                                     @include('productype.forms.type')
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('type', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
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

{!!Html::script('dist/js/productype.js')!!}
@endsection


