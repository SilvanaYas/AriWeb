<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

        <div class="form-group">
    <div class="col-lg-3 col-md-3 control-label">    
        {!!Form::label('nombres','Nombre:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombreProducto',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del producto','id'=>'nombreProducto','required'=>'required','maxlength'=>'100', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

 <div class="form-group">
    <div class="col-lg-3 col-md-3 control-label">    
        {!!Form::label('similarProducto','Producto Similar:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('similarProducto',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del producto','id'=>'similarProducto','required'=>'required','maxlength'=>'100', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
     {!!Form::label('idTipoProducto','Tipo:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    </div>
    <div class="col-lg-8">  
        {!!Form::select('idTipoProducto',$tipos,null,['id'=>'idTipoProducto','class'=>'form-control'], 'Ninguna')!!}
    </div>
</div>