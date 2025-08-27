<?php
$host = "192.168.111.128";
$user = "root";
$pass = "root";
$dbname = "vocational_test";
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>