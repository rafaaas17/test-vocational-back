<?php
// db.php - Configuración para Railway
$host = "crossover.proxy.rlwy.net"; // De MYSQL_PUBLIC_URL
$user = "root"; // De MYSQL_PUBLIC_URL
$pass = "qTwjlYXmguvUBToWGjsrscEJGPeJCmKg"; // De MYSQL_PUBLIC_URL
$dbname = "railway"; // De MYSQL_DATABASE
$port = 55890; // De MYSQL_PUBLIC_URL

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    // Para producción, no mostrar detalles del error al usuario
    error_log("Error de conexión: " . $conn->connect_error);
    die(json_encode(["status" => "error", "message" => "Error de conexión a la base de datos"]));
}

// Configurar charset a utf8
$conn->set_charset("utf8mb4");
?>
