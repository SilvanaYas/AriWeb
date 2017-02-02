<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombres','Nombres:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombreUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese sus nombres','id'=>'nombreUsuario','required'=>'required','maxlength'=>'25', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

 <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('apellidos','Apellidos:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('apellidoUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese sus apellidos','id'=>'apellidoUsuario','required'=>'required','maxlength'=>'25', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

 <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('email','Email:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required','pattern' => '^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$'])!!}
    </div>
</div>

 <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('telefono','Teléfono:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('telefonoUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese su teléfono','id'=>'telefonoUsuario','required'=>'required'])!!}
    </div>
</div>

 <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('Contraseña:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::password('password',['class'=>'form-control','placeholder'=>'Asignar contraseña'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
     {!!Form::label('Repita Contraseña','Repita Contraseña:*')!!}
     </div>
    <div class="col-lg-8">  
        {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Ingresa la contraseña una vez mas'])!!}
    </div>
</div>

 
  
