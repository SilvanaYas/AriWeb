    <div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombres','Nombre:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombreProducto',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del producto','id'=>'nombreProducto','maxlength'=>'100','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
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

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombrePresentacion','Presentacion:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombrePresentacion',null,['class'=>'form-control','placeholder'=>'Ingrese presentacion','id'=>'nombrePresentacion','required'=>'required','maxlength'=>'100', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('precioPresentacion','Precio por presentación:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::number('precioPresentacion',null,['class'=>'form-control','placeholder'=>'Ingrese el precio por presentación','id'=>'precioPresentacion','required'=>'required'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('fabricante','Fabricante:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('fabricante',null,['class'=>'form-control','placeholder'=>'Ingrese Fabricante','id'=>'fabricante','maxlength'=>'100','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>


 

