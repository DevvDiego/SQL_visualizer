<?php
include("dbconn.php");
    

function insert_departamentos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for departamento");
    }

    $stmt = $dbconn->prepare("INSERT INTO departamentos (nombre) VALUES (?)");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] [ERROR] Error: " . $stmt->error;
    }
    
    $stmt->close();
}

function insert_cursos($dbconn){

    if( ! isset($_POST["id_departamento"]) ){
        die("[STMT INSERT] [ERROR] No id_departamento given for curso");
    }
    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for curso");
    }

    $stmt = $dbconn->prepare("INSERT INTO cursos (id_departamento, nombre) VALUES (?,?)");
    $stmt->bind_param("ss", $_POST["id_departamento"], $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] [ERROR] Error: " . $stmt->error;
    }
    
    $stmt->close();
}


function insert_profesores($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] [ERROR] No name given for profesor");
    }

    $stmt = $dbconn->prepare("INSERT INTO profesores (nombre) VALUES (?)");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT INSERT] Datos insertados exitosamente";
    } else {
        echo "[STMT INSERT] [ERROR] Error: " . $stmt->error;
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
            insert_departamentos($dbconn);
            break;
        case "cursos":
            insert_cursos($dbconn);
            break;
        case "profesores":
            insert_profesores($dbconn);
            break;
        
        default:
            # code...
            break;
    }
    
    //keep here, so even if a func fails, conn gets closed
    $dbconn->close();
    
}catch(Exception $e){
    echo "[ERROR] " . $e->getMessage();
}

?>