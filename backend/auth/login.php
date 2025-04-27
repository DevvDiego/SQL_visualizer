<?php
session_start(); // Inicia o reanuda la sesión
require("../connect_mysql.php");



// Obtiene datos del login
$data = json_decode(file_get_contents("php://input"), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';



// Busca el usuario en la base de datos
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(); // Obtiene el usuario como array asociativo


// Si no existe el usuario o la contraseña no coincide
if (!$user || !password_verify($password, $user['password'])) {
  http_response_code(401); // 401: No autorizado
  die(json_encode("Credenciales inválidas"));
}


// Guarda datos en la sesión
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];


// Opcional: Regenera el ID de sesión para prevenir fixation attacks
session_regenerate_id(true);


// Confirma éxito
echo json_encode(["success" => true]);

?>