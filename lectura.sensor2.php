<?php
// Hola mundo
if( !empty($_GET)) {
	if (isset($_GET["id1"])){
		$id1  = htmlspecialchars($_GET["id1"],ENT_QUOTES);
		echo "id1 ha sido enviado exitosamente, su valor es: ".$id1." ";
	} else {
		echo "no se ha encontrado a id1 ";
	}

	if (isset($_GET["id2"])){
		$id2  = htmlspecialchars($_GET["id2"],ENT_QUOTES);
		echo "id2 ha sido enviado exitosamente, su valor es: ".$id2." ";
	} else {
		echo "no se ha encontrado a id2 ";
	}
	
	if (isset($_GET["v1"])){
		$v1  = htmlspecialchars($_GET["v1"],ENT_QUOTES);
		echo "v1 ha sido enviado exitosamente, su valor es: ".$v1." ";
	} else {
		echo "no se ha encontrado a v1 ";
	}
	
	if (isset($_GET["v2"])){
		$v2  = htmlspecialchars($_GET["v2"],ENT_QUOTES);
		echo "v2 ha sido enviado exitosamente, su valor es: ".$v2." ";
	} else {
		echo "no se ha encontrado a v2 ";
	}
	

} else{
	echo "No se ha recibido ningun valor";
}

?>