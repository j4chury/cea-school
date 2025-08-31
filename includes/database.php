<?php
$mysqli = new mysqli("localhost", "...", "...", "...");

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}
?>
