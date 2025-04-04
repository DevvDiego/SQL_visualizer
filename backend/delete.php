<?php
include("dbconn.php");

function delete_departamentos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for departamento");
    }

    $stmt = $dbconn->prepare("DELETE FROM departamentos WHERE nombre = ?");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT DELETE] Ejecucion exitosa";
    } else {
        echo "[STMT DELETE] [ERROR] Error: " . $stmt->error;
    }
    
    $stmt->close();
}

function delete_cursos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for cursos");
    }

    $stmt = $dbconn->prepare("DELETE FROM cursos WHERE nombre = ?");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT DELETE] Ejecucion exitosa";
    } else {
        echo "[STMT DELETE] [ERROR] Error: " . $stmt->error;
    }
    
    $stmt->close();
}

function delete_profesores($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for profesores");
    }

    $stmt = $dbconn->prepare("DELETE FROM profesores WHERE nombre = ?");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT DELETE] Ejecucion exitosa";
    } else {
        echo "[STMT DELETE] [ERROR] Error: " . $stmt->error;
    }
    
    $stmt->close();
}






try{

    if( ! isset($_POST["target"]) ){
        die("[ERROR] No target table");
    }

    $targetTable = $_POST["target"];

    switch ($targetTable) {
        case "departamentos":
            delete_departamentos($dbconn);
            break;
        case "cursos":
            delete_cursos($dbconn);
            break;
        case "profesores":
            delete_profesores($dbconn);
            break;
        
        default:
            # code...
            break;
    }
    
    //keep here, so even if a func fails, conn gets closed
    $dbconn->close();
    
}catch(Exception $e){
    echo "[ERROR]" . $e->getMessage();
}


?>