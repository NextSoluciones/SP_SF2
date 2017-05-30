var mapa;
var marker;

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
            	mapa=datos;
            	marker=datos.datos;
                console.log(datos.latcenter);
                initMap(mapa,marker);
                
                
            }
        });
      }


	window.onload = function(){
	   rescatarDatos();
     
    }
    
