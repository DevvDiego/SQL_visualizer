<?php
    require("../config/cors.php");
    require("../db/connect_database.php");
    require("../utils/send_response.php");
    
    session_start();


    // Validar datos
    $data = json_decode( file_get_contents("php://input"), true );
    $username = $data['username'] ?? '';
    $password = $data['password'] ?? '';

    if ( empty($username) || empty($password) ) {
        //Código 400: Bad Request
        send_response(400, "Usuario y contraseña requeridos");

    }

    $pdo = connect_database();

    // Verifica si el usuario ya existe
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) { // Si hay resultados, el usuario existe
        // 409: Conflicto (recurso ya existe)
        send_response(409, "El usuario ya existe");

    }    

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Inserta el nuevo usuario
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$username, $hashedPassword]);

        
    // Guarda datos en la sesión
    $_SESSION['user_id'] = $pdo->lastInsertId();;
    $_SESSION['username'] = $username;

    // Opcional: Regenera el ID de sesión para prevenir fixation attacks
    session_regenerate_id(true);

    // Confirma éxito
    send_response(200, "success");

?>