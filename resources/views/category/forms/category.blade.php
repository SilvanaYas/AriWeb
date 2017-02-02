<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
        {!!Form::label('nombreCategoria','Categoria:*',['class'=>'control-label col-sm-4'])!!}
    	<div class="input-group input-group-LG">
        {!!Form::text('nombreCategoria',null,['id'=>'nombreCategoria','class'=>'form-control','placeholder'=>'Ingrese una nueva categoría','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
        	<span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk red color-red"></i></span>
        </div>
    </div>