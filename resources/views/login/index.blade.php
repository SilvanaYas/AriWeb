 @extends('layouts.mapa')
  @section('title', 'Login')
@section('content')
@include('alerts.errors')
@include('login.forms.modal-info')

@if(Session:: has('message'))
<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif

    <div class="container">    
        <div  class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-success" >
                    <div class="panel-heading">
                        <div class="titles">Ingreso a la AWOPEC</div>
                        <div class="forget">
                        	{!!link_to('password/email', $title = 'Olvidaste tu contraseña?', $attributes = ['class'=>'text-color-blue pull-left'],$secure = null)!!}

                        </div>
                    </div>     

                    <div class="panel-body separar" >

                        <div class="alert alert-info col-sm-12">
                        	<strong> Por favor </strong> ingresa tu correo y tu Contraseña
                        </div>
                            
	          			{!!Form::open(['route'=>'log.store','method'=>'POST','class'=>'form-horizontal'])!!}
                                    
                            @include('login.forms.login')


                                <div class="form-group send">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <a id="btn-login" href="{!!URL::to('/')!!}" class="btn btn-primary">Cancelar  </a>
                                      {!!Form::submit('Ingresar',['class'=>'btn btn-success'])!!}
                                   </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div class="information" >
                                            No tienes una cuenta?
                                         <a href="" data-toggle="modal" data-target="#myModal">Informate
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                        </div>                     
                    </div>  
        </div>
         
    </div>
    


@endsection