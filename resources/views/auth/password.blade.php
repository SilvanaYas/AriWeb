@extends('layouts.email')
	@section('content')
    @include('alerts.validadores')
    @include('alerts.success')

<div class="container">
    <div class="col-lg-8 col-lg-offset-2 text-center">
      <div class="logo">
        <h1>Recuperar Contraseña</h1>
          </div>
          <p class="lead text-muted">Te enviaremos un enlace a tu correo para reestablecer tu contraseña</p>
          <div class="clearfix"></div>
                <div class="col-lg-6 col-lg-offset-3">
                    {!!Form::open(['url'=>'/password/email'])!!}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group input-group-LG">
                                    {!!Form::text('email',null,['id'=>'gro_nom','class'=>'form-control','placeholder'=>'Tu E-mail','required'=>'required','pattern' => '^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$','title'=>'ejemplo@dominio.com'])!!}
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button"><i class=" icon-envelope-alt"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <br />
                        <div class="col-lg-3  col-lg-offset-4">
                            <div class="btn-group">
                                {!!Form::submit('Enviar',['class'=>'btn btn-success'])!!}
                             </div>        
                        </div>
                </div>
    </div>      
</div>      
@endsection

<div class="form-group">
    <div class="col-md-6 col-md-offset-5">
    </div>
</div>

