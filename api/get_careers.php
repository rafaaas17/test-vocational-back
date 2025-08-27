<?php
require_once "db.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$area_id = intval($_GET['area_id']);
$q = $conn->query("SELECT id, nombre FROM carreras WHERE area_id = $area_id");
$carreras = [];
while ($row = $q->fetch_assoc()) {
    $carreras[] = $row;
}
echo json_encode($carreras);
$conn->close();
?>