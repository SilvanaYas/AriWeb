
    <div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>

    <div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('nombrePromocion','Promoción:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::text('nombrePromocion',null,['class'=>'form-control','placeholder'=>'Nombre de la Promoción','id'=>'nombrePromocion','required'=>'required','maxlength'=>'100', 'onKeyUp'=>'this.value = this.value.toUpperCase()'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-3 control-label">    
        {!!Form::label('descripcion','Descripción:')!!}        
    </div>
    <div class="col-lg-8">  
        {!!Form::textArea('descripcion',null,['class'=>'form-control','placeholder'=>'Ingrese descripción de la promoción','id'=>'descripcion','required'=>'required'])!!}
    </div>
</div>


    <div class="form-group">
        <div class="col-lg-3 control-label">    
               {!!Form::label('fechaInicioPromo','Fecha Inicio:')!!}  
        </div>
            <div class="col-xs-6">
                <div class="input-group input-group-sm">
        {!!Form::text('fechaInicioPromo',null,['class'=>'form-control','placeholder'=>'Fecha de inicio','id'=>'fechaInicioPromo','required'=>'required'])!!}

            <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
                </div>
            </div>
    </div>

        <div class="form-group">
            <div class="col-lg-3 control-label">    
                   {!!Form::label('fechaFinPromo','Fecha Fin:')!!}  
            </div>
                <div class="col-xs-6">
                    <div class="input-group input-group-sm">
            {!!Form::text('fechaFinPromo',null,['class'=>'form-control','placeholder'=>'Fecha de fin','id'=>'fechaFinPromo','required'=>'required'])!!}

                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i> </span>
                    </div>
                </div>
            </div> 
      
         <!--Script para el calendario-->
        <script type="text/javascript">
            jQuery(function($) {

                $( "#fechaInicioPromo" ).datepicker({
                        format: 'yyyy/mm/dd'
                }); 
                    
            });
        </script>

        <script type="text/javascript">
            jQuery(function($) {
            
                $( "#fechaFinPromo" ).datepicker({
                        format: 'yyyy/mm/dd'
                }); 
            });
        </script>


    




