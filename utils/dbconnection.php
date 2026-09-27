<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "TIENDA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Fallo de conexión: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");