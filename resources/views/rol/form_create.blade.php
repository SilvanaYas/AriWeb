@extends('layouts.templateAdmin')
@section('title', 'Registro de perfil')
    @section('content')
    @include('alerts.alertError')
    @include('alerts.alertSuccess')

    <div class="panel-center">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-xs-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <div class="title">Registro de Perfil de Usuario</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {!!Form::open()!!}
                    
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        
                                        @include('rol.forms.rol')
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-4 col-sm-10">
                                            {!!link_to('perfil', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
                                            {!!link_to('#', $title ='Registrar', $attributes = ['id'=>'rol', 'class'=>'btn btn-primary'], $secure = null)!!}
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

{!!Html::script('dist/js/rol.js')!!}
@endsection
