@extends('layouts.templateBlank')
 @section('title', 'Registro de Empresa')
@section('content')
@include('alerts.validadores')
@include('alerts.alertImgSize')

<div id="msj-success" class="alert alert-success alert-dismissible" role="alert" style="display:none">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Datos registrados con exito.</strong>
    </div>

<div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Registro de Empresa</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::open(['route'=>'company.store','method'=>'POST','files'=> true, 'class'=>'form-horizontal'])!!}           

                                    @include ('company.forms.profile')        

                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('company', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
                                            {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}
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
    {!!Html::script('dist/js/validar_img.js')!!}
@endsection
