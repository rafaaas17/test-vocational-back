<?php
require_once "db.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$proceso_id = intval($_GET['proceso_id'] ?? 1);

$preguntas = [];
$q = $conn->query("SELECT p.id, p.texto
                   FROM proceso_pregunta pp
                   JOIN preguntas p ON pp.pregunta_id = p.id
                   WHERE pp.proceso_id = $proceso_id");
while ($row = $q->fetch_assoc()) {
    $row['opciones'] = [];
    $qo = $conn->query("SELECT o.id, o.texto, o.area_id, o.icono, o.interes, a.nombre as area_nombre
                        FROM opciones o
                        JOIN areas a ON o.area_id = a.id
                        WHERE o.pregunta_id = {$row['id']}");
    while ($op = $qo->fetch_assoc()) {
        $row['opciones'][] = $op;
    }
    $preguntas[] = $row;
}
echo json_encode($preguntas);
$conn->close();
?>