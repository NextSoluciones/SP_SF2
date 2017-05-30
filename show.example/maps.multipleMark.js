var mapa;
var marker;
var infowindow;
var estado;



      function initMap(mapa, datos) {
        var central={lat: mapa.latcenter, lng: mapa.longcenter};
        
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: mapa.zoom,
          center: central

        });
        for (var i = 0; i <= datos.length - 1; i++) {
          



          var coordenadas={lat: datos[i].latitude, lng: datos[i].longitude};
          var marker = new google.maps.Marker({
            position: coordenadas,
            map: map,
            title: datos[i].Name
            icon: '../imgGustavo/'+datos[i].Parameters.State+'.png'
          });  

          
        infowindow=  new google.maps.InfoWindow();
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                          return function() {
                              consultar(datos[i].Id,marker);
                              
                              //map.setCenter(marker.getPosition());       
                                                    
                          }
            })(marker, i));
                //var valores=setInterval(estado(i,map,datos),10000);
                //var mensaje=setInterval(function(){alert("d"); },1000);
        
        }
        

      }


      function consultar(Id,marker){
        $parametros = {
            'ID' : Id
        };
        $.ajax({
            url: 'get.dataValue.static.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: $parametros,
            error: function(arguments,error){
              console.log(error);
            },
            success: function (datos){
              //alert(datos.medidas[0].valor);
              infowindow.setContent(""+datos.medidas[0].valor);
                infowindow.open(map, marker);
            }
        });

      }


      function estado(i,map,estaciones){
        $parametros = {
            
        };
        $.ajax({
            url: 'get.dataValue.static.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: $parametros,
            error: function(arguments,error){
                console.log(error);
            },
            success: function (datos){ 
              console.log(datos.medidas[0].valor);

                estado=datos.medidas[0].valor;



                    var coordenadas={lat: estaciones[i].latitude, lng: estaciones[i].longitude};

                    var marker = new google.maps.Marker({
                      position: coordenadas,
                      map: map,
                      title: estaciones[i].Name
                    });  

                    infowindow=  new google.maps.InfoWindow();
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                                  return function() {                                    
                                     infowindow.setContent(""+estado);
                                     infowindow.open(map, marker);
                                  }
                    })(marker, i));

        console.log("f");

        //setTimeout(function(){estado(i,map); } ,5000);



            }
        });


      }