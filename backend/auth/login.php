<?php
session_start();

// Ejemplo de validación (en producción usa password_hash()!)
$users = [
    'admin' => '1234'
];

$data = json_decode(file_get_contents('php://input'), true);
$username = $data['username'] ?? '';
$password = $data['password'] ?? '';

if (!isset($users[$username]) || $users[$username] !== $password) {
    http_response_code(401);
    die(json_encode(['error' => 'Credenciales inválidas']));
}

$_SESSION['user_id'] = $username;
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];

echo json_encode(['success' => true]);
?>