<?php
require("../config/cors.php");
require("../utils/send_json_and_exit.php");

session_start();
//? Deberia destruir esta sesion en caso de que
//? no se haya podido verificar

// ! quitar el json and exit? dado a que "protegere" las demas rutas no podria terminar aqui

// Verificar si la sesión es válida
if (isset($_SESSION['user_id'])) {
    // Usuario autenticado
    send_json_and_exit(200, ['authenticated' => true]);
    
} else {
    // Usuario no autenticado
    send_json_and_exit(401, ['authenticated' => false]);
    
}

?>