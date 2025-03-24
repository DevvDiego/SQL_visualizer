<?php
include("dbconn.php");

//! ##########  TEMPORAL  ##########
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
//! ##########  TEMPORAL  ##########

$query_result = mysqli_query($dbconn, "SELECT * FROM ciudadano");

if (! ($query_result->num_rows > 0) ) {
    $dbconn->close();
    exit;
}

//Get column names
$columns = [];
foreach ($query_result->fetch_fields() as $column) {
    $columns[] = $column->name;
}

//Get all data in an assoc array
$datos = $query_result->fetch_all(MYSQLI_ASSOC);

// Imprimir el JSON
header('Content-Type: application/json');
echo json_encode(
    [
        "columns"=>$columns,
        "fields"=>$datos
    ]
);

$dbconn->close();

?>