@extends('layouts.templateBanco')
 @section('title', 'Editar registro')
    @section('content')
    @include('alerts.validadores')

<div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Registro de Usuario</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::model($profile,['route'=>['company.update',$profile->idEmpresa],'method'=>'PUT','files'=> true, 'class'=>'form-horizontal'])!!}
                                    
                                    @include('company.forms.profile_edit')
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('company', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
                                            {!!Form::submit('Actualizar',['class'=>'btn btn-primary'])!!}
                                            </div>
                                        </div>
                                    {!!Form::close()!!}
                                </div>
                            </div>
                        </div>
        </div>
</div>
@endsection
