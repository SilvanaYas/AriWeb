@extends('layouts.mapa')
  @section('title', 'ARI WEB')
@section('content')
@include('alerts.validadores')
   
    <header id="intro">
        <div class="container">
            <div class="table">
                <div class="header-text">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3 class="light white">AHORA TODO EN UN SOLO LUGAR.</h3>
                            <h1 class="white typed">Acceso rápido a la Información</h1>
                            <span class="typed-cursor">|</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section id="services" class="section section-padded back">
        <div class="container">
            <div class="row text-center title">
                <h2>Busqueda de Bancos</h2>
                <h4 class="light muted">Por favor selecciona una opción de Búsqueda</h4>
                @include ('maps.forms.buscador')
            </div>
            <div class="row">
                <div class="col-md-3" id="contenido" style="overflow: scroll;height:540px;">
                          
                  </div>
                  <div class="col-md-9" id='map-index' style="width: 870px; height:520px"></div> 
            </div>
            </div>
        </div>
        <div class="cut cut-bottom"></div>
    </section>
    <section id="team" class="section gray-bg">
        <div class="container">
            <div class="row text-center title">
                <h2>Busqueda de Farmacias</h2>
                <h4 class="light muted">Por favor selecciona una opción de Búsqueda</h4>
            </div>
            <div class="row services">
            <div class="col-md-3"></div>
                <div class="col-md-6 modal-content">
                    AQUI VA TEXT0 2
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="cut cut-bottom"></div>
    </section>
    <section id="pricing" class="section">
        <div class="container">
            <div class="row text-center title">
                <h2>Busqueda de Gasolineras</h2>
                <h4 class="light muted">Por favor selecciona una opción de Búsqueda</h4>
            </div>
            <div class="row services">
            <div class="col-md-3"></div>
                <div class="col-md-6 modal-content">
                  AQUI VA TEXTO 3
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        <div class="cut cut-bottom"></div>
    </section>
    <section id="medicamentos" class="section section-padded">
        <div class="container">
            <div class="row text-center title">
                <h2>Busqueda de Medicamentos</h2>
                <h4 class="light muted">Por favor selecciona una opción de Búsqueda</h4>
            </div>
            <div class="row services">
            <div class="col-md-3"></div>
                <div class="col-md-6 modal-content">
                aqui va el texto
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>
    
@endsection

@section('scripts')
  {!!Html::script('https://maps.googleapis.com/maps/api/js?key=AIzaSyBuARYPXE5yS80q76KAf_I_4NexW_cuRek')!!}
  {!!Html::script('dist/js/markerclusterer.js')!!}

  {!!Html::script('dist/js/gasolinera.js')!!}
  


    <script>

      function initialize() {
        
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

              //INicializamos el mapa con posicion al usuarios

              var center = new google.maps.LatLng(lat, lon);
              var map = new google.maps.Map(document.getElementById('map-index'), {
            zoom: 13,
            center: center,
            mapTypeId: google.maps.MapTypeId.ROADMAP
            });



            var infoWindow = new google.maps.InfoWindow();

    var markers = [];

    var route = "/gasolinera/"+lat+"/"+lon+"";
    $.get(route, function(res){
      var datos = res.length;
      if(datos >0){
          for (var i = 0; i < datos; i++) {
            //Creamos el contenido con los nombres de las empresas
            /*var o = document.createElement("br");
            var e = document.createElement("input");
            e.setAttribute("value", res[i].nombreSucursal, "class","form-control");
            var padre = document.getElementById("contenido");
            padre.appendChild(e);
            padre.appendChild(o);*/

            var padre = document.getElementById("contenido");
            var item = document.createElement('DIV');
            var title = document.createElement('A');
            title.href = '#';
            title.className = 'empresa';
            title.innerHTML = res[i].nombreSucursal;

            item.appendChild(title);
            padre.appendChild(item);


            var latitud = res[i].latitud;
            var longitud = res[i].longitud;

            var latLng = new google.maps.LatLng(latitud,
                  longitud);
                  var marker = new google.maps.Marker({
                position: latLng,
                icon: '/img/icons/farmacia.png',
                animation: google.maps.Animation.DROP,
                title:res[i].nombreSucursal
                  });

                markers.push(marker);


                google.maps.event.addListener(marker, 'click', (function(marker, content) {
                return function() {
                    infoWindow.setContent(content);
                    infoWindow.open(map, marker);
                }
                })(marker, '<div>'+'<b>'+'<center>'+res[i].nombreSucursal+'</center>'+'</b>'+'<br>'+'<b>'+'Dirección:&nbsp'+'</b>'+res[i].direccion+'<br>'+'<b>'+'Teléfonos:&nbsp'+'</b>'+res[i].telefono+'</div>'));

                google.maps.event.addDomListener(title, 'click', (function(marker, content) {
                return function() {
                    infoWindow.setContent(content);
                    infoWindow.setPosition(latLng);
                    infoWindow.open(map, marker);

                }
                })(marker, '<div>'+'<b>'+'<center>'+res[i].nombreSucursal+'</center>'+'</b>'+'<br>'+'<b>'+'Dirección:&nbsp'+'</b>'+res[i].direccion+'<br>'+'<b>'+'Teléfonos:&nbsp'+'</b>'+res[i].telefono+'<br>'+'<center>'+'<a onclick="funcionClic('+res[i].nombreSucursal+')" >'+'Mostrar ruta'+'</a></div>'));
          }

          var markerCluster = new MarkerClusterer(map, markers, {imagePath: '/img/m'});

        var circleOptions = {
            strokeColor: "#0000FF",
            strokeOpacity: 0.8,
            strokeWeight:1.5,
            fillColor: "#0000FF",
            fillOpacity: 0.35,
            map:map,
            center: gLatLon,
            radius: 5000
          };
        var circle = new google.maps.Circle(circleOptions);

      }else{
          alert("NO hay datos registrados");
        }
    });
  }
}
      //google.maps.event.addDomListener(window, 'load', initialize);
      function funcionClic(a){
        alert(a+"llego");
      }

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
              gMarkerDV.setIcon('/img/icons/banco.png')


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
@endsection
