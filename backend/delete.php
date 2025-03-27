<?php
include("dbconn.php");

function delete_departamentos($dbconn){

    if( ! isset($_POST["nombre"]) ){
        die("[STMT INSERT] No name given for departamento");
    }

    $stmt = $dbconn->prepare("DELETE FROM departamentos WHERE nombre = ?");
    $stmt->bind_param("s", $_POST["nombre"]);

    if ($stmt->execute()) {
        echo "[STMT DELETE] Ejecucion exitosa";
    } else {
        echo "[STMT DELETE] Error: " . $stmt->error;
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
            delete_departamentos($dbconn);
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