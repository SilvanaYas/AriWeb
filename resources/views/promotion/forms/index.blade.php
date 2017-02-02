@section('content')

<div class="alertabox">
        <div class="col-md-8 col-md-offset-2">
                                    
          <div class="panel panel-default" >
             <div class="panel-heading">                       
               <div class="alerta alert-info">
                      <p>
                        <strong>
                          <i class="ace-icon fa fa-check"></i>
                          NO existe ninguna promoción registrada para el producto seleccionado!
                        </strong><br>
                        Por favor registra la promoción para el producto
                        <div class="col-md-2 col-md-offset-4">
                            {!!link_to('promotion/create', $title ='Registrar', $attributes = ['class'=>'btn btn-primary'], $secure = null)!!}
                          </div>
                      </p>

                    </div>
                  </div>
              </div>
        </div>
</div>
@endsection



            