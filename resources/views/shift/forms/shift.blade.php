	<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
     <p class="blue">FECHA:</p> 

	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('fechaInicio','Fecha Inicio:')!!}  
	   	</div>
			<div class="col-xs-6">
				<div class="input-group input-group-sm">
		{!!Form::text('fechaInicio',null,['class'=>'form-control','placeholder'=>'Fecha de inicio','id'=>'fechaInicio','required'=>'required'])!!}

			<span class="input-group-addon"><i class="ace-icon fa fa-calendar"></i>	</span>
				</div>
			</div>
	</div>

		<div class="form-group">
		   	<div class="col-lg-3 control-label">    
		     	   {!!Form::label('fechaFin','Fecha Fin:')!!}  
		   	</div>
				<div class="col-xs-6">
					<div class="input-group input-group-sm">
			{!!Form::text('fechaFin',null,['class'=>'form-control','placeholder'=>'Fecha de fin','id'=>'fechaFin','required'=>'required'])!!}

				<span class="input-group-addon"><i class="ace-icon fa fa-calendar"></i>	</span>
					</div>
				</div>
			</div> 

	<p class="blue">HORA:</p> 

	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('horaInicio','Hora Inicio:')!!}  
	   	</div>
			<div class="col-xs-6">
				<div class="input-group clockpicker input-group-sm" id = "clockpicker">
		{!!Form::text('horaInicio',null,['class'=>'form-control','placeholder'=>'Hora de inicio','id'=>'horaInicio','required'=>'required'])!!}
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
			</div>
	</div>

	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('horaFin','Hora Fin:')!!}  
	   	</div>
			<div class="col-xs-6">
				<div class="input-group clockpicker input-group-sm" id = "clockpicker">
                   {!!Form::text('horaFin',null,['class'=>'form-control','placeholder'=>'Hora Fin','id'=>'horaFin','required'=>'required'])!!}
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
			</div>
	</div>




	

                          
