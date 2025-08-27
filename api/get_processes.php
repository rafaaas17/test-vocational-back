<?php
require_once "db.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
$q = $conn->query("SELECT * FROM procesos ORDER BY fecha DESC");
$procesos = [];
while ($row = $q->fetch_assoc()) {
    $procesos[] = $row;
}
echo json_encode($procesos);
$conn->close();
?>