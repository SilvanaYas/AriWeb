@extends('layouts.templateGasolinera')
@section('title', 'Registro de sucursal')
@section('content')
@include('alerts.validadores')
                     
  <div class="alert alert-info">
        <strong>ATENCIÓN!</strong> Todos los campos marcados con <a class="text-red big">( * )</a> son Obligatorios.
    </div> 
  <div class="">               
        {!!Form::open(['route'=>'adminbranch.store','method'=>'POST','class'=>'form-horizontal'])!!}
                     
                               <h4 class="header center blue"> <strong></strong></h4>

                                    <div class="col-sm-5">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title"></h4>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main no-padding">
                                    @include ('branch.forms.branchs')                           
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <div class="widget-box">
                                            <div class="widget-header">
                                                <h4 class="widget-title"></h4>
                                            </div>

                                            <div class="widget-body">
                                                <div class="widget-main">
                                                    @include ('branch.forms.mapa')                        
                                                </div>
                                            </div>
                                        </div>

                                        <div class="space-6"></div>
                                       
                                    </div>
                               
                               

    <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
               {!!link_to('adminbranch', $title ='Cancelar', $attributes = ['class'=>'btn btn-danger'], $secure = null)!!}
              {!!Form::submit('Registrar',['class'=>'btn btn-primary'])!!}

                </div>
            </div>
            {!!Form::close()!!}
</div>


  @stop   

  @section('scripts')
  {!!Html::script('dist/js/cantones.js')!!}
  {!!Html::script('dist/js/parroquias.js')!!}

{!!Html::script('http://maps.googleapis.com/maps/api/js?key=AIzaSyBuARYPXE5yS80q76KAf_I_4NexW_cuRek&libraries=places')!!}
{!!Html::script('dist/js/markerclusterer.js')!!}

<script>
  var map = new google.maps.Map(document.getElementById('map'),{   
        center:{
            lat: -4.00789,
            lng: -79.21128
        },
        zoom:15
   });

   var marker= new google.maps.Marker({
        position:{
            lat: -4.00789,
            lng: -79.21128
        },
        map:map,
        draggable:true
   });

   var searchBox= new google.maps.places.SearchBox(document.getElementById('searchmap'));
   google.maps.event.addListener(searchBox,'places_changed',function(){
        var places=searchBox.getPlaces();
        var bounds=new google.maps.LatLngBounds();
        var i, place;

    for (i = 0; place=places[i] ; i++){
    bounds.extend(place.geometry.location);
    marker.setPosition(place.geometry.location);
   }
   map.fitBounds(bounds);
   map.setZoom(15);   

   });

   google.maps.event.addListener(marker,'position_changed',function(){
        var lat=marker.getPosition().lat();
        var lng=marker.getPosition().lng();
    $('#latitude').val(lat);
    $('#longitude').val(lng);
   });
   </script>
@endsection

            