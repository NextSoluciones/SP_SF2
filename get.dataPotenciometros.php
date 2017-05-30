<?php

include 'conexion.php';
$query = 'SELECT * FROM potenciometros LIMIT  0 , 10';
$sad = mysqli_query($conecta, $query);
$data = array();
$acumLat = 0;
$acumLong = 0;
while ($mostrar = mysqli_fetch_array($sad)) {
    $tmp = array("Id" => $mostrar["id"],
        "Name" => $mostrar["name"],
        "Create_date" => $mostrar["create_date"],
        "latitude" => (float)$mostrar["latitude"],
        "longitude" => (float)$mostrar["longitude"],
        "active" => (float)$mostrar["active"]
    );
    array_push($data, $tmp);
    $acumLat = $acumLat + (float) $mostrar["latitude"];
    $acumLong = $acumLong + (float) $mostrar["longitude"];
}
$num_data = sizeof($data);
$promedioLat = $acumLat / $num_data;
$promedioLong = $acumLong / $num_data;

/*$StaticInfo = array(
    ' datos ' => $data,
    ' Map ' =>
    [ ' option ' => [
            'zoom' => 16,
            'Latcenter' => $promedioLat,
            'Longcenter' => $promedioLong,
        ]]);
*/
$StaticInfo = array(
    'datos' => $data,
    'zoom' => 12,
    'latcenter' => (float)$promedioLat,
    'longcenter' => (float)$promedioLong,
    );

echo json_encode($StaticInfo);