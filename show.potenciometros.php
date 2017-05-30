<!DOCTYPE html>
<html>
<head>
	<title>Marcadore multiples v1.0
	</title> 

  <head>
<script type="text/javascript" languaje="javascript" src="js/jquery-3.2.1.min.js"></script>

	
<script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBLnlAQH441DxvN2xRinRYC3hyQ_5BGJGE" async="" defer="defer" type="text/javascript"></script>
    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>


</head>
<body>
  <div id="header" class="col-md-12" >
  <!-- Navigation -->
    <?php include_once("include/navbar.general.php"); ?>  
  </div>
<div id="map">
	
</div>

<script type="text/javascript" languaje="javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="show.example/maps.multipleMark.js"></script>
<script type="text/javascript" src="show.example/rescatar.datos.js"></script>
</head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <div id="img"></div>
    <script>
    var zoom, latcenter, longcenter;
    var datos2;
    var medidas2;
    var infowindow;


      function rescatarDatos(){
      	$parametros = {
            
        };
        $.ajax({
            url: 'get.dataParametros.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: $parametros,
            error: function(arguments,error){
            	console.log(error);
            },
            success: function (datos){
                zoom=datos.zoom;
                latcenter=datos.latcenter;
                longcenter=datos.longcenter;
                datos2=datos.datos; 
                  initMap();             
            }
        });

      }

      function initMap() {
       console.log(latcenter);
        var central={lat: latcenter, lng: longcenter};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: zoom,
          center: central
        });

       infowindow = new google.maps.InfoWindow();
        for (var i = 0; i <= datos2.length - 1; i++) {
          var coordenadas={lat: datos2[i].latitude, lng: datos2[i].longitude};
          var marker = new google.maps.Marker({
            position: coordenadas,
            map: map,
            title: datos2[i].Name, 
            
            });  

    
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {

        $.ajax({
            url: 'get.dataValue.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: $parametros,
            error: function(arguments,error){
              console.log(error);
            },
            success: function (medidas){                
                medidas2=medidas.medidas;                 
                   infowindow.setContent("<b>Nombre:</b> "+datos2[i].Name+"<br><b>Valor:</b> "+medidas2[0].valor+"<br><b>Fecha:</b> "+medidas2[0].fecha);                   
                    infowindow.open(map, marker);               
            }
        });                                        
                }
            })(marker, i));

        }

      }

 function cargarDatosMapa (){
        // Programa Ajax para pedir Data del Mapa
        $parametros = {
               
            };
        $url = "get.dataValue.php";
        $.ajax({
            type: "POST",
            url: $url,
            data: $parametros,
            dataType : "json",
            success: function(data){
                ArrayData = data;
                pointMarker = ArrayData.pointMarker;
                mapOptions = {
                  zoom: ArrayData.mapOption.zoom,
                  center: new google.maps.LatLng(ArrayData.mapOption.centerPosition[0],ArrayData.mapOption.centerPosition[1]),
                  mapTypeId: google.maps.MapTypeId.ROADMAP

                };

                rescatarDatos ();   
                addMarkerWithTimeout();
            }
        });
    }

      function addMarkerWithTimeout(position, timeout) {
        window.setTimeout(function() {
          markers.push(new google.maps.Marker({
            position: position,
            map: map,
            animation: google.maps.Animation.DROP
          }));
        }, timeout);
      }



      function consultar(){

      };


	window.onload = function(){
	   rescatarDatos();
     
    }
    </script>
   <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyCUM-S9w4Bc67h8-z26N7f5oNSppl7TcTk" async="" defer="defer" type="text/javascript"></script>
  
  </body>
</html>




