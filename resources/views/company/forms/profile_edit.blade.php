<div class="alert alert-info">
        <strong>ATENCIÓN!</strong><br> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.<br>Su imagen no debe de superar las siguientes medidas 200 x 200 ni deberá superar el peso de 200 Kb
</div>

    <h3 class="header blue lighter smaller">
    <i class="ace-icon fa fa-calendar-o smaller-90"></i>
        PERFIL DE MI EMPRESA
</h3>


    <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombreEmpresa','Razón social:')!!}  
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombreEmpresa',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de su Empresa','required'=>'required','maxlength'=>'30', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('logo','Logo:')!!}    
    </div>
    <div class="col-lg-8">  
    <input type="file" name="logo" accept="image/*" onchange="ValidarImagen(this);" />

    </div>
</div>

