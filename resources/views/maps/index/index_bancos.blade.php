    <div id="exTab2" class="back"> 
        <ul class="nav nav-tabs">
              <li>
                <a  href="#" data-toggle="tab"></a>
              </li>
              <li>
                <a  href="#" data-toggle="tab"></a>
              </li>
              <li class="active">
                <a  href="#3" data-toggle="tab">Por nombre</a>
              </li>
              <li><a href="#4" data-toggle="tab">Por localización</a>
              </li>
            </ul>

              <div class="tab-content ">
                <div class="tab-pane active" id="3">
                    <div class="col-sm-12 col-md-12 col-xs-6">
                    @if(Session:: has('msjb'))
                      <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('msjb')}}
                      </div>
                    @endif
                    @include ('maps.forms.buscador')
                    </div>       
                 </div>
                <div class="tab-pane" id="4">
                    <div class="col-sm-12 col-md-12 col-xs-6">
                    @include ('maps.forms.localizacionb')
                      </div>        
                </div>
                
              </div>
          </div>