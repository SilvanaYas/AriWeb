<div class="panel panel-default" >

    <br><div class="form-group">
    <div class="col-lg-3 control-label">    
    {!!Form::label('Localizar:')!!}
        <i class="fa fa-map-marker light-red bigger-110"></i>
    </div>
    <div class="col-lg-8">  
    {!!Form::text('localizar',null,['class'=>'form-control ','placeholder'=>'Ingresa tu cuidad, cantón o parroquia','id'=>'searchmap'])!!}
    </div>   
</div>

<div class="mapa">
    <br><p class="text-blue">Por favor mueva el cursor rojo para ubicar tu posicion exacta en el mapa.</p> 
    <div id='map' style="width: 600px; height:400px; padding-left: 100px"></div><br><br>


<div class="form-group">
    <div class="col-lg-5 control-label">    
        {!!Form::label('latitud:')!!}
    </div>
    <div class="col-lg-4">  
        {!!Form::text('latitud',null,['class'=>'form-control','id'=>'latitude'])!!}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-5 control-label">    
        {!!Form::label('longitud:')!!}
    </div>
    <div class="col-lg-4">  
        {!!Form::text('longitud',null,['class'=>'form-control','id'=>'longitude'])!!}
    </div>
</div>

</div>

</div>
