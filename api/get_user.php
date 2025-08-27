<?php
require_once "db.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$usuario_id = intval($_GET['usuario_id']);
$q = $conn->query("SELECT * FROM usuarios WHERE id = $usuario_id");
echo json_encode($q->fetch_assoc());
$conn->close();
?>