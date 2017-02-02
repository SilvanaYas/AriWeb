<div style="margin-bottom: 25px" class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
             
         {!!Form::email('email',null,['class'=>'form-control','placeholder'=>'Ingrese su email','required'=>'required','pattern' => '^[\w._%-]+@[\w.-]+\.[a-zA-Z]{2,4}$'])!!}
                                      
 </div>
                                
 <div style="margin-bottom: 25px" class="input-group">
       <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
         {!!Form::password('password',['class'=>'form-control','placeholder'=>'Ingrese su contraseña','required'=>'required'])!!}
 </div>
                                        
  <div class="input-group">
       <div class="checkbox">
         <label>
              <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
         </label>
    </div>
</div>                             
