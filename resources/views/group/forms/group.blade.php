<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
    <div class="form-group">
        {!!Form::label('nombreGrupo','Grupo:')!!}
    	<div class="input-group input-group-LG">
        	{!!Form::text('nombreGrupo',null,['id'=>'nombreGrupo','class'=>'form-control','placeholder'=>'Ingrese un nuevo grupo','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
        	<span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
        </div>
    </div>

 
		


