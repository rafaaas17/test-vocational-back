<?php
require_once "db.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$q = $conn->query("SELECT id, nombre, descripcion FROM areas");
$areas = [];
while ($row = $q->fetch_assoc()) {
    $areas[] = $row;
}
echo json_encode($areas);
$conn->close();
?>
