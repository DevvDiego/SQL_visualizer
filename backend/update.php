<?php
include("dbconn.php");
    

function update_departamentos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No identifier given for departamento");
    }

    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No name given for departamento");
    }

    $stmt = $dbconn->prepare("UPDATE departamentos SET nombre = ? WHERE id_departamento = ?");
    $stmt->bind_param("si", $_POST["nombre"], $_POST["identifier"]);

    if ($stmt->execute()) {
        echo "[STMT UPDATE] Datos actualizados exitosamente";
    } else {
        echo "[STMT UPDATE] Error: " . $stmt->error;
    }
    
    $stmt->close();
}
    

function update_cursos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No identifier given for curso");
    }

    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No name given for curso");
    }

    $stmt = $dbconn->prepare("UPDATE cursos SET nombre = ? WHERE id_curso = ?");
    $stmt->bind_param("si", $_POST["nombre"], $_POST["identifier"]);

    if ($stmt->execute()) {
        echo "[STMT UPDATE] Datos actualizados exitosamente";
    } else {
        echo "[STMT UPDATE] Error: " . $stmt->error;
    }
    
    $stmt->close();
}
    

function update_profesores($dbconn){
    
    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No identifier given for profesor");
    }

    if( ! isset($_POST["nombre"]) ){
        die("[STMT UPDATE] No name given for profesor");
    }

    $stmt = $dbconn->prepare("UPDATE profesores SET nombre = ? WHERE id_profesor = ?");
    $stmt->bind_param("si", $_POST["nombre"], $_POST["identifier"]);

    if ($stmt->execute()) {
        echo "[STMT UPDATE] Datos actualizados exitosamente";
    } else {
        echo "[STMT UPDATE] Error: " . $stmt->error;
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
            update_departamentos($dbconn);
            break;
        case "cursos":
            update_cursos($dbconn);
            break;
        case "profesores":
            update_profesores($dbconn);
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