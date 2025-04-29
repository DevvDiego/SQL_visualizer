<?php
require_once("../config/cors.php");
require_once("../utils/JsonResponse.php");

session_start();
//? Deberia destruir esta sesion en caso de que
//? no se haya podido verificar

if( !isset($_SESSION["user_id"]) ){
    // Usuario no autenticado
    JsonResponse::send_and_exit(401, ['authenticated' => false]);
    
}

?>