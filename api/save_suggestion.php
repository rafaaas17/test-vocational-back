<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(200); exit(); }
header("Content-Type: application/json");
require_once "db.php";
$data = json_decode(file_get_contents("php://input"), true);
$usuario_id = $data['usuario_id'];
$area_id = $data['area_id'];
$conn->query("INSERT INTO sugerencias (usuario_id, area_id) VALUES ($usuario_id, $area_id)");
echo json_encode(["status" => "success"]);
$conn->close();
?>