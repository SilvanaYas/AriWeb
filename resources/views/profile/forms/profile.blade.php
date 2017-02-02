    <div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
            {!!Form::label('nombres','Nombres:',['class'=>'control-label col-sm-4'])!!}
        <div class="col-sm-8">
            <div class="input-group input-group-LG">
             {!!Form::text('nombreUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese sus nombres','id'=>'nombreUsuario', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
                <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('apellidos','Apellidos:',['class'=>'control-label col-sm-4'])!!}
        <div class="col-sm-8">
            <div class="input-group input-group-LG">
            {!!Form::text('apellidoUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese sus apellidos','id'=>'apellidoUsuario', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
            <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('email','Email:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">
            <div class="input-group input-group-LG">     
                {!!Form::text('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','id'=>'email'])!!}
            <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('telefono','Teléfono:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">
            <div class="input-group input-group-LG">            
                {!!Form::text('telefonoUsuario',null,['class'=>'form-control','placeholder'=>'Ingrese su teléfono','id'=>'telefonoUsuario'])!!}
                <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('Contraseña:',null,['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">      
            <div class="input-group input-group-LG">      
                {!!Form::password('password',['class'=>'form-control','placeholder'=>'Asignar contraseña','id'=>'password'])!!}
                <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
        </div>
    </div>

    <div class="form-group">
        {!!Form::label('Repita Contraseña','Repita Contraseña:*',['class'=>'control-label col-sm-4'])!!}
    <div class="col-sm-8">
        <div class="input-group input-group-LG">      
            {!!Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Repita la contraseña'])!!}
            <span class="input-group-addon"><i class=" glyphicon glyphicon-asterisk color-red"></i></span>
             </div>
    </div>
    </div>




