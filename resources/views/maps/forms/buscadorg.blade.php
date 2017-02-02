            <br><div class="">
            {!!Form::open(['route'=>'ari.store','method'=>'POST','class'=>'form-horizontal'])!!}
            
            {!!Form::label('nombreg','Nombre de la Gasolinera:',['class'=>'control-label'])!!}

            {!!Form::text('nombreg',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de una GASOLINERA','required'=>'required','title'=>'Ej. VALDIVIEZO','id'=>'nombreg', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}

              {!!Form::hidden('idg',null, ['id'=>'idg'])!!}
              {!!Form::hidden('idGrupog',null, ['id'=>'idGrupog'])!!}
              <br><br>
              <div class="col-sm-offset-5 col-sm-4">
              {!!Form::submit('Buscar',['class'=>'btn btn-primary'])!!}
              </div><br><br>
          {!!Form::close()!!}
            </div>
        