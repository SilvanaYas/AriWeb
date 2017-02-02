@extends('layouts.mapa2')
 @section('title', 'Farmacias')
@section('content')

<!--<span class="glyphicon glyphicon-map-marker"></span>-->

                @if(count($informacion)>0)

                    <div class="row">                        
                        <div class="col-sm-6 col-md-5 col-xs-6" style="overflow: scroll;height:540px;">
                        <a href="{!!URL::to('/')!!}" type="button" class="btn btn-success">Nueva Busquedad</a>
                          <h4 class="center">FARMACIAS CERCANAS</h4>

                        <div class="boxes">
                          <ul>
                                    @foreach($informacion as $datos)
                                          <li>
                                            
                                            <div class="col-sm-2 col-md-2 col-xs-2"><img src="/img/icons/farmacia.png" class="profile-img pull-left"></div>

                                                <div class="col-sm-10 col-md-10 col-xs-10">
                                                    <div><span class="text-black">{{$datos->nombreSucursal}}</span><button type="" class="btn btn-info btn-xs pull-right">Abierto</button>
                                                    </div>
                                                    <div class="">
                                                        <span class="text-black">Dirección:&nbsp</span>
                                                        <span class="text-blue">{{$datos->direccion}}</span>
                                                    </div>

                                                    <div class="">
                                                        <span class="text-black">Teléfonos:&nbsp</span>
                                                        <span class="text-blue">{{$datos->telefono}}</span>
                                            <input type="button" class="btn btn-primary btn-xs pull-right" value="ruta" onClick="funcionClick({{$datos->latitud}},{{$datos->longitud}},'{{$datos->nombreSucursal}}','{{$datos->telefono}}','{{$datos->direccion}}')">

                                                    </div>

                                                </div>
                                            </li>
                                        <br><br> 
                                         @endforeach
                              </ul>
                          </div>
                        </div>                         
                            
                       
                        <div class="col-sm-6 col-md-7 col-xs-6">
                                <div id='map-index' class="img-responsive" style="width: 850px; height:520px"></div> 
                        </div>
                    </div>           
        
@endsection
 @section('scripts')
 {!!Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBuARYPXE5yS80q76KAf_I_4NexW_cuRek')!!}
{!!Html::script('dist/js/markerclusterer.js')!!}

{!!Html::script('dist/js/cantones.js')!!}
  {!!Html::script('dist/js/parroquias.js')!!}

   <script>
      function initialize() {
        var center = new google.maps.LatLng(-2.0000000, -77.5000000);

        var map = new google.maps.Map(document.getElementById('map-index'), {
          zoom: 7,
          center: center,
          mapTypeId: google.maps.MapTypeId.ROADMAP

        });
        navigator.geolocation.getCurrentPosition(fn_ok, fn_error);

           function fn_error()
           {
              alert('Por favor habilita la opción para poder conocer tu ubicación');
           }
           function fn_ok(res)
           {
              var lat = res.coords.latitude;
              var lon = res.coords.longitude;
              var gLatLon = new google.maps.LatLng(lat, lon);

        var infoWindow = new google.maps.InfoWindow();

        var markers = [];
            @foreach($farmacias as $farmas)               

          var latLng = new google.maps.LatLng({{$farmas->latitud}},
              {{$farmas->longitud}});
          var marker = new google.maps.Marker({
            position: latLng,
            icon: '/img/icons/farmacia.png',
            animation: google.maps.Animation.DROP,
            title:"{{$farmas->nombreSucursal}}"
          });

          markers.push(marker);

          google.maps.event.addListener(marker, 'click', (function(marker, content) {
            return function() {
                infoWindow.setContent(content);
                infoWindow.open(map, marker);
            }
        })(marker, '<div>'+'<b>'+'<center>'+'{{$farmas->nombreSucursal}}'+'</center>'+'</b>'+'<br>'+'<b>'+'Dirección:&nbsp'+'</b>'+'{{$farmas->direccion}}'+'<br>'+'<b>'+'Teléfonos:&nbsp'+'</b>'+'{{$farmas->telefono}}'+'</div>'));
        
        @endforeach

        var markerCluster = new MarkerClusterer(map, markers, {imagePath: '/img/m'});

         var circleOptions = {
            strokeColor: "#0000FF",
            strokeOpacity: 0.8,
            strokeWeight:1.5,
            fillColor: "#0000FF",
            fillOpacity: 0.35,
            map:map,
            center: gLatLon,
            radius: 3000
          };
        var circle = new google.maps.Circle(circleOptions);

        }
      }
      google.maps.event.addDomListener(window, 'load', initialize);


    </script>

     <script>
     function funcionClick(lati,long,name,phono,direction){

   var divMapa = document.getElementById('map-index');
   navigator.geolocation.getCurrentPosition(fn_ok, fn_error);

   function fn_error()
   {
              alert('Por favor habilita la opción para poder conocer tu ubicación');
   }
   function fn_ok(res)
   {
      var lat = res.coords.latitude;
      var lon = res.coords.longitude;

      var gLatLon = new google.maps.LatLng(lat, lon);
      var objConfig = {
          zoom: 17,
          center: gLatLon
      }
//Recive dos parametros donde mostrar y un objeto de Configuracionq establece donde se ubicaa el mapa
      var gMapa = new google.maps.Map(divMapa, objConfig);
      var objConfigMarker = {
          position: gLatLon,
          map: gMapa,
          title: "Usted esta AQUI"
      }
    // dos parametros Posicion del marker y el mapa donde mostrar
      var gMarker = new google.maps.Marker(objConfigMarker);
          gMarker.setIcon('/img/icons/persona.png')



//DIVISION ENTRE LOS DOS PUNTOS A TRAZAR

var g2LatLon = new google.maps.LatLng(lati, long);
     
      var config = {
          position: g2LatLon,
          map: gMapa,
          title: "DESTINO",
          animation: google.maps.Animation.DROP
          }
           var gMarkerDV = new google.maps.Marker(config);
              gMarkerDV.setIcon('/img/icons/farmacia.png')


          // POnemos el infoWindows

          var objHTML = {
              content: '<div style="height: 200 px; width: 300px"><h4>'+name+'</h4><p><b>Direccion:&nbsp</b>'+direction+'</p><p><b>Telefonos:&nbsp</b>'+phono+'</p></div>'
          }
          var gIW = new google.maps.InfoWindow(objHTML);

          //QUe obj esta asociado al evento
          //que evento quiero asignar
          //fncion que se asocia al objeto
          google.maps.event.addListener(gMarkerDV,'click',function(){
              gIW.open(gMapa, gMarkerDV);
          });



          //TRAZAR LA RUTA ENTRE DOS PUNTOS
          var objConfigDR = {
              map: gMapa,
              suppressMarkers: true
          }

          var objConfigDS = {
            origin: gLatLon, //ubicacion del Usuario
            destination: g2LatLon ,
            travelMode: google.maps.TravelMode.DRIVING
          }

          var ds = new google.maps.DirectionsService();
          var dr = new google.maps.DirectionsRenderer(objConfigDR); //Traduce la ruta a una linea visible paa el suario

          ds.route(objConfigDS, fnRutear);

          function fnRutear(resultados, status){
            //mostrar la linea entre A y B
            if(status == 'OK'){
                dr.setDirections(resultados);
            }else{
              alert('Error'+status);
            }
          }
      }

   }

    </script>
    @else
      <div class="alert alert-info">
      <div class="col-sm-6 col-md-5 col-xs-6">
                        <a href="{!!URL::to('/allfarmacias')!!}" type="button" class="btn btn-success">Nueva Busquedad</a>
</div>
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>AVISO!!</strong><br>No existen FARMACIAS Registradas en el lugar que usted Busca hasta el momento. Por favor busque en otra localización 
      </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  @endif

    @endsection


