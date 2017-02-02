    {!!Form::open(['class'=>'form-inline','id'=>'form_gaso'])!!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          {!!Form::label('nombre','Nombre del Banco:',['class'=>'control-label'])!!}

          {!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ejemplo: BANCO DE LOJA','title'=>'Ej: BANCO PICHINCHA','required'=>'required','id'=>'nombre', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}

          {!!link_to('#', $title ='Buscar', $attributes = ['id'=>'gasolinera', 'OnClick'=>'initialize()','class'=>'btn btn-primary'], $secure = null)!!}
    {!!Form::close()!!}
        