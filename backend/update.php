<?php
include("dbconn.php");
    

function update_departamentos($dbconn){

    if( ! isset($_POST["field"]) ){
        die("[STMT UPDATE] No field given for departamento");
    }
    
    if( ! isset($_POST["current_data"]) ){
        die("[STMT UPDATE] No current_data given for departamento");
    }
    
    if( ! isset($_POST["new_data"]) ){
        die("[STMT UPDATE] No new_data given for departamento");
    }

    $field = $_POST["field"]; //use this to not update dinamically the prepared stmt

    $stmt = $dbconn->prepare("UPDATE departamentos SET $field = ? WHERE $field = ?");
    $stmt->bind_param("ss", $_POST["new_data"], $_POST["current_data"],);

    if ($stmt->execute()) {
        echo "[STMT UPDATE] Datos actualizados exitosamente";
    } else {
        echo "[STMT UPDATE] Error: " . $stmt->error;
    }
    
    $stmt->close();
}
    

function update_cursos($dbconn){

    if( ! isset($_POST["field"]) ){
        die("[STMT UPDATE] No field given for departamento");
    }
    
    if( ! isset($_POST["current_data"]) ){
        die("[STMT UPDATE] No current_data given for departamento");
    }
    
    if( ! isset($_POST["new_data"]) ){
        die("[STMT UPDATE] No new_data given for departamento");
    }

    $field = $_POST["field"]; //use this to not update dinamically the prepared stmt

    $stmt = $dbconn->prepare("UPDATE departamentos SET $field = ? WHERE $field = ?");
    $stmt->bind_param("ss", $_POST["new_data"], $_POST["current_data"],);


    if ($stmt->execute()) {
        echo "[STMT UPDATE] Datos actualizados exitosamente";
    } else {
        echo "[STMT UPDATE] Error: " . $stmt->error;
    }
    
    $stmt->close();
}
    

function update_profesores($dbconn){
    
    if( ! isset($_POST["field"]) ){
        die("[STMT UPDATE] No field given for departamento");
    }
    
    if( ! isset($_POST["current_data"]) ){
        die("[STMT UPDATE] No current_data given for departamento");
    }
    
    if( ! isset($_POST["new_data"]) ){
        die("[STMT UPDATE] No new_data given for departamento");
    }

    $field = $_POST["field"]; //use this to not update dinamically the prepared stmt

    $stmt = $dbconn->prepare("UPDATE departamentos SET $field = ? WHERE $field = ?");
    $stmt->bind_param("ss", $_POST["new_data"], $_POST["current_data"],);

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