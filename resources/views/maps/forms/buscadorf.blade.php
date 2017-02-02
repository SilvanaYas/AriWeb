            <br><div class="">
            {!!Form::open(['route'=>'ari.store','method'=>'POST','class'=>'form-horizontal'])!!}
            
            {!!Form::label('nombref','Nombre de la Farmacia:',['class'=>'control-label'])!!}

            {!!Form::text('nombref',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de una FARMACIA','required'=>'required','title'=>'Ej. FYBECA','id'=>'nombref', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}

              {!!Form::hidden('idf',null, ['id'=>'idf'])!!}
              {!!Form::hidden('idGrupof',null, ['id'=>'idGrupof'])!!}
              <br>
              <div class="col-sm-offset-5 col-sm-4">
              {!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
              </div><br><br>
          {!!Form::close()!!}
            </div>
        