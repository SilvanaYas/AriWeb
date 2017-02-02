<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar Producto</h4>
      </div>
      <div class="modal-body form-horizontal">
     
        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        <input type="hidden" id="id">
        @include('alerts.alertError')
        @include('product.forms.product')
      </div>
      <div class="modal-footer">
      {!!link_to('#', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger','data-dismiss'=>'modal'], $secure = null)!!}

      {!!link_to('#', $title='Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-primary'], $secure = null)!!}
      </div>
    </div>
  </div>
</div>