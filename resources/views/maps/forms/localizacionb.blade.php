        <br><br><form action="banco" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <div class="form-group">
                    {!!Form::label('idProvincia','Provincia:',['class'=>'control-label col-sm-2'])!!}
                    <div class="col-sm-10">
                          {!!Form::select('idProvincia',$provinces,null,['id'=>'idProvincia','class'=>'form-control','placeholder'=>'Selecciona', 'required'])!!}
                    </div>
              </div>

              <div class="form-group">
                    {!!Form::label('idCanton','Canton:',['class'=>'control-label col-sm-2'])!!}
                    <div class="col-sm-10">
                          {!!Form::select('idCanton',['placeholder'=>'Selecciona'],null,['id'=>'idCanton','class'=>'form-control'])!!}
                    </div>
              </div>

              <div class="form-group">
                    {!!Form::label('idParroquia','Parroquia:',['class'=>'control-label col-sm-2'])!!}
                    <div class="col-sm-10">
                          {!!Form::select('idParroquia',['placeholder'=>'Selecciona'],null,['id'=>'idParroquia','class'=>'form-control'])!!}
                    </div>
              </div>              

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
               {!!Form::submit('Buscar',['class'=>'btn btn-blue-fill ripple'])!!}
             </div>
        </div>
      </form>
      @section('scripts')

{!!Html::script('dist/js/cantones.js')!!}
  {!!Html::script('dist/js/parroquias.js')!!}
  @endsection