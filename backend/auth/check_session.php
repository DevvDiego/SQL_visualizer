<?php
require("../config/cors.php");
require("../utils/send_json_and_exit.php");

session_start();

// Verificar si la sesión es válida
if (isset($_SESSION['user_id'])) {
    // Usuario autenticado

    send_json_and_exit(200, [
        'authenticated' => true,
        'user_id' => $_SESSION['user_id'],
        'username' => $_SESSION['username']
    ]);

} else {
    // Usuario no autenticado
    send_json_and_exit(401, [
        'authenticated' => false,
        'message' => 'No autorizado'
    ]);
    
}

?>