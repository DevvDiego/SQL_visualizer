<?php
require("../config/cors.php");
require("../utils/JsonResponse.php");

session_start();
//? Deberia destruir esta sesion en caso de que
//? no se haya podido verificar

if( !isset($_SESSION["user_id"]) ){
    // Usuario no autenticado
    JsonResponse::send_and_exit(401, ['authenticated' => false]);
    
}

//at this point the user exist and is authenticated
JsonResponse::send_and_continue(200, ["authenticated" => true]);

?>