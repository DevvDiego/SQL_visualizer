<?php
require("../config/cors.php");
require("../utils/JsonResponse.php");

session_start(); // Necesario para acceder a la sesión

// Elimina todas las variables de sesión
session_unset();

// Destruye la sesión (elimina el archivo del servidor)
session_destroy();

// Redirige al login (en el frontend)
// header("Location: http://localhost/login");
JsonResponse::send_and_exit(200, "logged out")

?>