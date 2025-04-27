<?php

function connect_database(){
    $credentials = require("../config/credentials.php");

    $DB_HOST = $credentials["DB_HOST"];
    $DB_NAME = $credentials["DB_NAME"];
    $DB_USER = $credentials["DB_USER"];
    $DB_PASS = $credentials["DB_PASS"];


    try{

        $pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USER, $DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    } 
    catch (PDOException $ex) {
        die("Error de conexión: " . $ex->getMessage());
    }
}

?>