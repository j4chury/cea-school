<?php
session_start();
include('database.php');

$sql = "SELECT COUNT(*) AS total_mensajes  FROM mensajes  WHERE destinatario = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_SESSION['id']);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $mensajes_t = $row['total_mensajes'];
} else {
    $mensajes_t = "0";
}

$stmt->close();
$mysqli->close();
?>