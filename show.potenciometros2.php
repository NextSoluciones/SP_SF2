<!DOCTYPE html>
<html>
  <head>
<script type="text/javascript" languaje="javascript" src="js/jquery-3.2.1.min.js"></script>

    <style>
      #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <div id="img"></div>
    <script>
    var zoom, latcenter, longcenter;
    var datos2;
    var infowindow;
      function rescatarDAtos(){
      	$parametros = {
            
        };
        $.ajax({
            url: 'get.dataPotenciometros.php',
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
        var central={lat: latcenter, lng: longcenter};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: zoom,
          center: central
        });
        for (var i = 0; i <= datos2.length - 1; i++) {
          var coordenadas={lat: datos2[i].latitude, lng: datos2[i].longitude};
          var marker = new google.maps.Marker({
            position: coordenadas,
            map: map,
            title: datos2[i].Name
          });  

          
        infowindow=  new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                          return function() {
                              consultar(datos2[i].Id,marker);
                              
                              //map.setCenter(marker.getPosition());       
                                                    
                          }
            })(marker, i));
        }
      }
      function consultar(Id,marker){
        $parametros = {
            'ID' : Id
        };
        $.ajax({
            url: 'get.dataValue.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: $parametros,
            error: function(arguments,error){
              console.log(error);
            },
            success: function (datos){
              //console.log(datos);
              //alert(datos.medidas[0].valor);
              infowindow.setContent(""+datos.valor);
                infowindow.open(map, marker);
            }
        });

      }

	window.onload = function(){
	   rescatarDAtos();
     
    }
    </script>
   <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBLnlAQH441DxvN2xRinRYC3hyQ_5BGJGE" async="" defer="defer" type="text/javascript"></script>
  
  </body>
</html>