
<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
<div class="form-group">
        {!!Form::label('nombreTipoProducto','Tipo de Producto:*',['class'=>'control-label col-sm-4'])!!}
        <div class="input-group input-group-LG">
        {!!Form::text('nombreTipoProducto',null,['id'=>'nombreTipoProducto','class'=>'form-control','placeholder'=>'Ingrese un tipo de Producto', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
            <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk red color-red"></i></span>
        </div>
    </div>

<div class="form-group">
     {!!Form::label('idGrupo','Grupo:',['class'=>'control-label col-sm-4'])!!}
        <div class="input-group input-group-LG">
    {!!Form::select('idGrupo',$groups,null,['id'=>'idGrupo','class'=>'form-control'])!!}
        </div>
    </div>

    