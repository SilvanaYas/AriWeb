    <div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div>
    
    <div class="form-group">
         {!!Form::label('category','Crédito:',['class'=>'control-label col-sm-4'])!!}
        <div class="col-sm-8">
        {!!Form::select('idCategoria',$categories,null,['id'=>'idCategories','class'=>'form-control'])!!}
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('montoMinimo','Monto mínimo:',['class'=>'control-label col-sm-4'])!!}
        <div class="col-sm-8">
            {!!Form::number('montoMinimo',null,['class'=>'form-control','placeholder'=>'Ingrese monto mínimo del crédito','required'=>'required','min'=>'1','max'=>'1000000'])!!}
        </div>
    </div>


     <div class="form-group">
            {!!Form::label('montoMaximo','Monto máximo:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">       
            {!!Form::number('montoMaximo',null,['class'=>'form-control','placeholder'=>'Ingrese el monto maximo para el crédito','required'=>'required','min'=>'1','max'=>'1000000'])!!}
        </div>
    </div>

     <div class="form-group">
            {!!Form::label('plazoMinimo','Plazo mínimo:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">       
            {!!Form::number('plazoMinimo',null,['class'=>'form-control','placeholder'=>'Ingrese palzo minimo en años','required'=>'required','min'=>'1','max'=>'12'])!!}
        </div>
    </div>

    <div class="form-group">
            {!!Form::label('plazoMaximo','Plazo máximo:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">       
            {!!Form::number('plazoMaximo',null,['class'=>'form-control','placeholder'=>'Ingrese el plazo maximo en años','required'=>'required','min'=>'1','max'=>'12'])!!}
        </div>
    </div>

    <div class="form-group">
            {!!Form::label('tasaInteres','Taza de interes:',['class'=>'control-label col-sm-4'])!!} 
        <div class="col-sm-8">       
            {!!Form::number('tasaInteres',null,['class'=>'form-control','placeholder'=>'Ingrese la tasa de interes anual para el crédito','step'=>'0.01','required'=>'required','pattern'=>'[0-9]{1-2}+[.]{1}[0-9]{2}'])!!}
        </div>
    </div> 


