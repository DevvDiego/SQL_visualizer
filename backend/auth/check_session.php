<?php
require("../config/cors.php");

session_start();

// Verificar si la sesión es válida
if (isset($_SESSION['user_id'])) {
    // Usuario autenticado
    http_response_code(200);
    echo json_encode([
        'authenticated' => true,
        'user_id' => $_SESSION['user_id'],
        'username' => $_SESSION['username']
    ]);
    exit;

} else {
    // Usuario no autenticado
    http_response_code(401);
    echo json_encode([
        'authenticated' => false,
        'message' => 'No autorizado'
    ]);
    exit;
    
}

?>