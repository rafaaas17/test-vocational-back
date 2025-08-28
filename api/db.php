<?php
// db.php - Configuración para Railway
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Obtener variables de entorno de Railway
$host = getenv('MYSQLHOST') ?: 'localhost';
$user = getenv('MYSQLUSER') ?: 'root';
$pass = getenv('MYSQLPASSWORD') ?: '';
$dbname = getenv('MYSQLDATABASE') ?: 'railway';
$port = getenv('MYSQLPORT') ?: 3306;

// Intentar conexión
$conn = new mysqli($host, $user, $pass, $dbname, $port);

// Verificar conexión
if ($conn->connect_error) {
    error_log("Error de conexión a BD: " . $conn->connect_error);
    
    http_response_code(500);
    echo json_encode([
        "status" => "error", 
        "message" => "Error de conexión con la base de datos"
    ]);
    exit();
}

$conn->set_charset("utf8mb4");
?>
