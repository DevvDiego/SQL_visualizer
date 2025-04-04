<?php
include("config/headers.php");

//DEVELOPMENT
$user="root";
$host="localhost";
$db="universidad";
$pswd="";

// Create connection
$dbconn = new mysqli($host, $user, $pswd, $db);

// Check connection
if ($dbconn->connect_error) {
  die("Connection failed: " . $dbconn->connect_error);
}


?>