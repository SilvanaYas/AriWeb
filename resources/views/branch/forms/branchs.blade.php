
<div class="panel panel-default" >
<p class="text-blue">Datos de la Empresa</p>

<div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('nombreSucursal','Empresa:')!!}    
    </div>
    <div class="col-lg-8">  
    {!!Form::text('nombreSucursal',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de su empresa','id'=>'nombreSucursal','maxlength'=>'100','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!} 
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
     {!!Form::label('idProvincia','Provincia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    </div>
    <div class="col-lg-8">  
            {!!Form::select('idProvincia',$provinces,null,['id'=>'idProvincia','class'=>'form-control', 'placeholder'=>'Selecciona'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
     {!!Form::label('idCanton','Canton:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    </div>
    <div class="col-lg-8">  
        {!!Form::select('idCanton',['placeholder'=>'Selecciona'],null,['id'=>'idCanton','class'=>'form-control'])!!}

    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
     {!!Form::label('idParroquia','Parroquia:',['class'=>'control-label col-md-3 col-sm-3 col-xs-12'])!!}
    </div>
    <div class="col-lg-8">  
        {!!Form::select('idParroquia',['placeholder'=>'Selecciona'],null,['id'=>'idParroquia','class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('direccion','Dirección:')!!}    
    </div>
    <div class="col-lg-8">  
    {!!Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Ingrese su Dirección','maxlength'=>'100','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>



<div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('telefono','Teléfono:')!!}    
    </div>
    <div class="col-lg-8">  
    {!!Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Ingrese su Telefono','maxlength'=>'100','required'=>'required'])!!}
    </div>
</div>
<p class="text-blue">Datos del Propietario</p>
<div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('propietario','Representante Legal:')!!}    
    </div>
    <div class="col-lg-8">  
    {!!Form::text('propietario',null,['class'=>'form-control','placeholder'=>'Ingrese su Telefono','maxlength'=>'100','required'=>'required', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
            {!!Form::label('email','Email:',['class'=>'control-label col-sm-4'])!!} 
    </div>
    <div class="col-lg-8">  
            {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','id'=>'email'])!!}
    </div>
</div>

</div>
