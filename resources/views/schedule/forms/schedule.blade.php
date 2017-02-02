	<div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('descripcion','De:')!!}  
	   	</div>
	   	<div class="col-xs-6">
				<div class="input-group input-group-sm">
			   {!!Form::select('descripcion', ['LUNES' => 'LUNES', 'MARTES' => 'MARTES', 'MIERCOLES' => 'MIERCOLES', 'JUEVES' => 'JUEVES', 'VIERNES' => 'VIERNES', 'SABADO' => 'SABADO', 'DOMINGO' => 'DOMINGO', 'FERIADOS' => 'FERIADOS'],'LUNES',['class'=>'form-control','id'=>'descripcion'])!!}	
			   </div>
		</div>
	</div>

	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('descripcion2','a:')!!}  
	   	</div>
	   	<div class="col-xs-6">
				<div class="input-group input-group-sm">
				
				{!!Form::select('descripcion2', ['LUNES' => 'LUNES', 'MARTES' => 'MARTES', 'MIERCOLES' => 'MIERCOLES', 'JUEVES' => 'JUEVES', 'VIERNES' => 'VIERNES', 'SABADO' => 'SABADO', 'DOMINGO' => 'DOMINGO', 'FERIADOS' => 'FERIADOS'], 'LUNES',['class'=>'form-control','id'=>'descripcion2'])!!}
				</div>
		</div>
				
	</div>


	<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('horaInicioHorario','Hora Inicio:')!!}  
	   	</div>
			<div class="col-xs-6">
				<div class="input-group clockpicker input-group-sm" id = "clockpicker">
		{!!Form::text('horaInicioHorario',null,['class'=>'form-control','placeholder'=>'Hora de inicio','id'=>'horaInicioHorario','required'=>'required'])!!}
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
			</div>
	</div>

<div class="form-group">
	   	<div class="col-lg-3 control-label">    
	     	   {!!Form::label('horaFinHorario','Hora Fin:')!!}  
	   	</div>
			<div class="col-xs-6">
				<div class="input-group clockpicker input-group-sm" id = "clockpicker">
					{!!Form::text('horaFinHorario',null,['class'=>'form-control','placeholder'=>'Hora Fin','id'=>'horaFinHorario','required'=>'required'])!!}
                    <span class="input-group-addon">
                       <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
			</div>
	</div>