<?php
include("dbconn.php");

$data = mysqli_query($dbconn, "SELECT * FROM ciudadano");

if (! ($data->num_rows > 0) ) {
    $dbconn->close();
    exit;
}

// Convertir todos los resultados directamente a un array asociativo
$datos = $data->fetch_all(MYSQLI_ASSOC);

// Imprimir el JSON
header('Content-Type: application/json');
echo json_encode($datos);

$dbconn->close();

?>