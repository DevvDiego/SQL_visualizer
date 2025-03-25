<?php
include("dbconn.php");

try{

    //Get the parameters
    if( isset( $_POST["nombre"] ) ){
        $nombre = $_POST["nombre"];
    }

    if( isset( $_POST["edad"] ) ){
        $edad = $_POST["edad"];
    }

    if( isset( $_POST["ciudad"] ) ){
        $ciudad = $_POST["ciudad"];
    }

    $stmt = $dbconn->prepare("INSERT INTO ciudadano (nombre, edad, ciudad) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nombre, $edad, $ciudad);

    if ($stmt->execute()) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error: " . $stmt->error;
    }


    // regresa una respuesta json
    // header('Content-Type: application/json');
    // echo json_encode("ok");

    $stmt->close();
    $dbconn->close();
    
}catch(Exception $e){
    echo $e->getMessage();
}

?>