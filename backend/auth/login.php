<?php
    require("../config/cors.php");
    require("../db/connect_database.php");
    
    
    session_start();


    // Obtiene datos del login
    $data = json_decode(file_get_contents("php://input"), true);
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';


    $pdo = connect_database();

    
    // Busca el usuario en la base de datos
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user_data = $stmt->fetch(); // Obtiene el usuario como array asociativo

    // Si no existe el usuario o la contraseña no coincide
    if (!$user_data || !password_verify($password, $user_data['password'])) {
        http_response_code(401); // 401: No autorizado
        die(json_encode("Credenciales invalidas"));
    }

    // Guarda datos en la sesión
    $_SESSION['user_id'] = $user_data['id'];
    $_SESSION['username'] = $user_data['username'];


    // Opcional: Regenera el ID de sesión para prevenir fixation attacks
    session_regenerate_id(true);


    // Confirma éxito
    echo json_encode(["success" => true]);

?>