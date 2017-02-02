@extends('layouts.templateBanco')
@section('title', 'Registro de créditos')
@section('content')
@include('alerts.validadores')


<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Datos registrados correctamente</strong>
    </div>

<div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Registro de Créditos</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::open(['route'=>'credit.store','method'=>'POST','class'=>'form-horizontal'])!!}
                                    {!!csrf_field()!!}
                                    @include ('service.forms.credito')
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('credit', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}

                                            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
                                            </div>
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
        </div>
</div>

  @stop    


          