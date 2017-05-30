 <?php

include 'conexion.php';
$id="2";
$id = htmlspecialchars($_POST["ID"],ENT_QUOTES);
$query = "select * from medicion where id_potenciometro=".$id." order by id desc limit 0,1";
$sad = mysqli_query($conecta, $query);
$data = array();

while ( $mostrar =mysqli_fetch_array($sad)) {
    $tmp = array(
    		"Id" => $id,
            "valor" => (float)$mostrar["value"],
            "fecha" => (float)$mostrar["date"]
            );
    array_push($data, $tmp);
}
echo json_encode($tmp);