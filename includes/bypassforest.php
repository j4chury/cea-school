<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:../../../");
    exit();
}
if ($_SESSION['rol'] === 'docente') {
    header("Location: ../../../sites/docentes/home");
    exit();
}


?>