<?php

$servername = "localhost:3306"; 
$username = "root";  
$password = "Fabian80";  
$dbname = "Biblioteca"; 

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>