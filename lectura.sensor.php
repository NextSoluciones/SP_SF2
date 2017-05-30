<?php
// Hola mundo
if( !empty($_GET)) {
require ("conexion.php");
	$estado = 1;

	if (isset($_GET["id1"])){
		$id1  = htmlspecialchars($_GET["id1"],ENT_QUOTES);
		echo "id1 ha sido enviado exitosamente, su valor es: ".$id1." ";
	} else {
		$estado = 0;
		echo "no se ha encontrado a id1 ";
	}

	if (isset($_GET["id2"])){
		$id2  = htmlspecialchars($_GET["id2"],ENT_QUOTES);
		echo "id2 ha sido enviado exitosamente, su valor es: ".$id2." ";
	} else {
		$estado = 0;
		echo "no se ha encontrado a id2 ";
	}
	
	if (isset($_GET["v1"])){
		$v1  = htmlspecialchars($_GET["v1"],ENT_QUOTES);
		echo "v1 ha sido enviado exitosamente, su valor es: ".$v1." ";
	} else {
		$estado = 0;
		echo "no se ha encontrado a v1 ";
	}
	
	if (isset($_GET["v2"])){
		$v2  = htmlspecialchars($_GET["v2"],ENT_QUOTES);
		echo "v2 ha sido enviado exitosamente, su valor es: ".$v2." ";
	} else {
		$estado = 0;
		echo "no se ha encontrado a v2 ";
	}
	
	if($estado == 1){
		$sql1 = "INSERT INTO medicion (id, id_potenciometro, date, value) VALUES (null,".$id1.",NOW(),".$v1.")";
	    $sql2 = "INSERT INTO medicion (id, id_potenciometro, date, value) VALUES (null,".$id2.",NOW(),".$v2.")";
	    $sad1 = mysqli_query($conecta, $sql1);
	    $sad2 = mysqli_query($conecta, $sql2);
	    $mostrar1 =mysqli_fetch_array($sad1);
	    $mostrar2 =mysqli_fetch_array($sad2);
	}else {
		echo "no voy a guardar nada ...";
	}
} else{
	echo "No se ha recibido ningun valor";
}






