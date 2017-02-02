@section('content')

<div class="alertabox">
        <div class="col-md-8 col-md-offset-2">
                                    
          <div class="panel panel-default" >
             <div class="panel-heading">                       
               <div class="alerta alert-info">
                      <p>
                        <strong>
                          <i class="ace-icon fa fa-check"></i>
                          NO cuentas con ningunA presentación registrada para el producto seleccionado!
                        </strong><br>
                        Por favor registra presentaciones.
                        <div class="col-md-2 col-md-offset-4">
                            {!!link_to('presentation/create', $title ='Registrar', $attributes = ['class'=>'btn btn-primary'], $secure = null)!!}
                          </div>
                      </p>

                    </div>
                  </div>
              </div>
        </div>
</div>
@endsection



            