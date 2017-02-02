@extends('layouts.templateBlank')
@section('content')
    <div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3>Estimado Usuario</h3>
          </div>
              <div class="modal-body alert alert-info alert-dismissible">
                  Por favor haga click en el Botón para registrar los datos de su Empresa
            </div>
             <div class="modal-footer">
                {!!link_to('company/create', $title ='Registrar', $attributes = ['class'=>'btn btn-primary'], $secure = null)!!}     
            </div>
          </div>
       </div>
    </div>
@endsection
@section('scripts')
<script>
   $(document).ready(function()
   {
      $("#mostrarmodal").modal("show");
   });
</script>
        @endsection