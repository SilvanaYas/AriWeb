	<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
        {!!Form::label('nombreRol','Perfil:')!!}
    	<div class="input-group input-group-LG">
        	{!!Form::text('nombreRol',null,['id'=>'nombreRol','class'=>'form-control','placeholder'=>'Ingrese un nuevo perfil', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
        	<span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk red color-red"></i></span>
        </div>
    </div> 
