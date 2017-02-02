<div class="row">   
   <div class="col-sm-6 col-md-5 col-xs-6">

<div class="alert alert-info alert-dismissible" role="alert"><a href="{!!URL::to('/')!!}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-arrow-left
">Atrás</span></a><h3 class="center">BÚSQUEDA DE GASOLINERAS</h3>
<div class="center blue"><strong class="center">Por favor</strong>&nbsp;&nbsp;Selecciona una opcíon de Búsqueda</div>
</div>

        <div id="exTab2" class="containe"> 
        <ul class="nav nav-tabs">
              <li>
                <a  href="#" data-toggle="tab"></a>
              </li>
              <li>
                <a  href="#" data-toggle="tab"></a>
              </li>
              <li class="active">
                <a  href="#5" data-toggle="tab">Por nombre</a>
              </li>
              <li><a href="#6" data-toggle="tab">Por localización</a>
              </li>
            </ul>

              <div class="tab-content ">
                <div class="tab-pane active" id="5">
                    <div class="col-sm-6 col-md-12 col-xs-6">
                    @include ('maps.forms.buscadorg')
                    @if(Session:: has('msjg'))
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('msjg')}}
                      </div>
                    @endif
                    </div>       
                 </div>
                <div class="tab-pane" id="6">
                    <div class="col-sm-6 col-md-12 col-xs-6">
                    @include ('maps.forms.localizaciong')
                      </div>        
                </div>
                
              </div>
          </div> 
   
   </div>
</div>


