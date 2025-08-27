<?php
// ==== CONFIGURACIÓN CORS ====
// Estos headers siempre van al inicio del archivo (antes de cualquier output)
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Si la petición es OPTIONS (preflight de CORS), respondemos vacío y terminamos
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// ==== CONTENIDO DEL API ====
// Importante: esto ya es tu lógica del endpoint
header("Content-Type: application/json");

require_once "db.php"; // tu conexión a la BD

$data = json_decode(file_get_contents("php://input"), true);

if (!$data) {
    echo json_encode(["status" => "error", "message" => "No se recibieron datos"]);
    exit;
}

$nombres = $data['nombres'];
$apellidos = $data['apellidos'];
$dni = $data['dni'];
$nivel = $data['nivel'];
$email = $data['email'];
$celular = $data['celular'];
$terms = $data['terms'] ? 1 : 0;

$sql = "INSERT INTO usuarios (nombres, apellidos, dni, nivel, email, celular, terms) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $nombres, $apellidos, $dni, $nivel, $email, $celular, $terms);

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "usuario_id" => $conn->insert_id]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$stmt->close();
$conn->close();
?>
