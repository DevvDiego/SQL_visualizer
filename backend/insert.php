<?php
include("dbconn.php");
header('Content-Type: application/json');
    

function insert_departamentos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] No name given for departamento");
    }

    $stmt = $dbconn->prepare("INSERT INTO departamentos (nombre) VALUES (?)");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] Error: " . $stmt->error;
    }
    
    $stmt->close();
}

function insert_cursos($dbconn){

    if( ! isset($_POST["id_departamento"]) ){
        die("[STMT INSERT] No id_departamento given for curso");
    }
    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] No name given for curso");
    }

    $stmt = $dbconn->prepare("INSERT INTO cursos (id_departamento, nombre) VALUES (?,?)");
    $stmt->bind_param("ss", $_POST["id_departamento"], $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] Error: " . $stmt->error;
    }
    
    $stmt->close();
}


function insert_profesores($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] No name given for profesor");
    }

    $stmt = $dbconn->prepare("INSERT INTO profesores (nombre) VALUES (?)");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] Error: " . $stmt->error;
    }
    
    $stmt->close();
}


try{

    if( ! isset($_POST["target"]) ){
        die("No target table");
    }

    $targetTable = $_POST["target"];

    switch ($targetTable) {
        case "departamentos":
            insert_departamentos($dbconn);
            break;
        
        default:
            # code...
            break;
    }
    
    //keep here, so even if a func fails, conn gets closed
    $dbconn->close();
    
}catch(Exception $e){
    echo $e->getMessage();
}

?>