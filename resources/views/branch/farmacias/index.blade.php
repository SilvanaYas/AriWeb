@extends('layouts.templateFarmacia')
@section('title', 'Inicio')
@section('content')
@if(Session:: has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
    
 @if(count($path)>0)
    @foreach ($path as $data)
  <div class="row">
      <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 box-inner">
                    @foreach ($img as $logo)

                    <img src="/img/{{$logo->logo}}" alt="" class="col-md-offset-4">  
                    @endforeach
                    <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn btn-primary btn dropdown-toggle">Opciones <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li>{!!link_to_route('branch.edit', $title = 'Editar Datos', $parameters = $data->idSucursal, $attributes = ['class'=>'glyphicon glyphicon-pencil'])!!}</li>
                                                <li class="divider"></li>
                                            <li><a href="reporteSucursal/1" target="_blank"><i class="fa fa-file-pdf-o red"></i>Visualizar Reporte</a></li>
                                                <li class="divider"></li>
                                            <li><a href="reporteSucursal/2"><i class="glyphicon glyphicon-download green"></i>Descargar Reporte</a></li>
                                         </ul>
                                      </div>
                      <br><br>
                        <div class="col-md-offset-3">
                            <strong class="blue">Empresa:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data->nombreSucursal}}</span><br>
                            <strong class="blue">Telefono:</strong>&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data->telefono}}</span><br>
                            <strong class="blue">Dirección:</strong>&nbsp;&nbsp;&nbsp;<span>{{$data->direccion}}</span><br>
                            <strong class="blue">Provincia:</strong>&nbsp;&nbsp;&nbsp;<span>{{$data->nombreProvincia}}</span><br>
                            <strong class="blue">Canton:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>{{$data->nombreCanton}}</span><br>
                            <strong class="blue">Parroquia:</strong>&nbsp;&nbsp;&nbsp;<span>{{$data->nombreParroquia}}</span><br>
                        </div>                                      
                    </div>            
                <div class="col-md-6">
                        <div class="row">
                            <br>
                            <div id='map-canvas'></div>
                        </div>
                </div>       
              </div>
          </div>
    </div><!--/row-->

@endsection
@section('scripts')
{!!Html::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyBuARYPXE5yS80q76KAf_I_4NexW_cuRek&libraries=places')!!}

<script>

  var lat={{$data->latitud}};
  var lng={{$data->longitud}};
    var map = new google.maps.Map(document.getElementById('map-canvas'), {
    center:{
      lat:lat,
      lng:lng
    },
            zoom: 15
        });
    var marker= new google.maps.Marker({
      position:{
        lat:lat,
        lng:lng
      },
      map:map

    });


</script>
@endforeach
@else
 <P class="text-danger">Usted no cuenta con datos de su empresa registrados</P>
     {!!link_to('branch/create', $title='Registrar datos', $attributes = ['class'=>'btn btn-success'], $secure = null)!!}
@endif
@endsection
