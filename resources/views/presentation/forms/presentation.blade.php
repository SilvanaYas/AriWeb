<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombrePresentacion','Presentacion:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombrePresentacion',null,['id'=>'nombrePresentacion','class'=>'form-control','placeholder'=>'Ingrese presentacion', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
        
    </div>
</div>
<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('fabricante','Fabricante:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('fabricante',null,['id'=>'fabricante','class'=>'form-control','placeholder'=>'Ingrese Fabricante', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>


<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('unidadesPresentacion','Unidades por presentación:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('unidadesPresentacion',null,['id'=>'unidadesPresentacion','class'=>'form-control','placeholder'=>'Ingrese las unidades que contiene cada presentación'])!!}
    </div>
</div>


<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('precioPresentacion','Precio por presentación:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('precioPresentacion',null,['id'=>'precioPresentacion','class'=>'form-control','placeholder'=>'Ingrese el precio por presentación'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('precioUnidad','Precio por unidad:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('precioUnidad',null,['id'=>'precioUnidad','class'=>'form-control','placeholder'=>'Ingrese el precio del producto por unidad'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('observacion','Observaciones:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('observacion',null,['id'=>'observacion','class'=>'form-control','placeholder'=>'Ingrese observaciones del producto', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>



