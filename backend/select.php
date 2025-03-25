<?php
include("dbconn.php");

try{
    //Get the GET url queryTo parameter
    $param = "";
    if( isset( $_GET["queryTo"] ) ){
        $param = $_GET["queryTo"]; 
    }

    $query_result = mysqli_query($dbconn, "SELECT * FROM " . $param);

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
    
}catch(Exception $e){
    echo $e->getMessage();
}

?>