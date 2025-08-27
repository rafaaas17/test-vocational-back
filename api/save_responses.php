<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }
header("Content-Type: application/json");
require_once "db.php";
$data = json_decode(file_get_contents("php://input"), true);
$usuario_id = $data['usuario_id'];
$proceso_id = $data['proceso_id'];
$respuestas = $data['respuestas'];
foreach ($respuestas as $resp) {
    $pregunta_id = $resp['pregunta_id'];
    $opcion_id = $resp['opcion_id'];
    $conn->query("INSERT INTO respuestas (usuario_id, pregunta_id, opcion_id) VALUES ($usuario_id, $pregunta_id, $opcion_id)");
}
echo json_encode(["status" => "success"]);
$conn->close();
?>