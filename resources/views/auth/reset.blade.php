@extends('layouts.email')
    @section('content')
    @include('alerts.validadores')


    <div class="container">    
        <div  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-success" >
                <div class="panel-heading">
                    <div class="titles">Restablecer Contraseña</div> 
                </div>     

    <div class="panel-body separar" >

    <div class="alert alert-info col-sm-12">
        <strong> Por favor </strong> ingresa tu correo y tu nueva Contraseña
    </div>
                            
    {!!Form::open(['url'=>'/password/reset'])!!}
        {!!Form::hidden('token', $token, null)!!}

    <div style="margin-bottom: 25px" class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        {!!Form::text('email',null,['value'=>"{{old('email')}}",'class'=>'form-control','placeholder'=>'Ingresa tu correo'])!!}
 </div>
 <div style="margin-bottom: 25px" class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
         {!!Form::password('password',['class'=>'form-control','placeholder'=>'Nueva Contraseña'])!!}
 </div><div style="margin-bottom: 25px" class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-ok"></i></span>
         {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Repita contraseña'])!!}
 </div>
                                    
                                <div class="form-group send">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      {!!Form::submit('Restablecer Contraseña',['class'=>'btn btn-primary'])!!}
                                   </div>
                                </div>    
                        </div>                     
                    </div>  
        </div>
         
    </div>
            


@endsection





