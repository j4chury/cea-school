<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location:../../../");
    exit();
}
if ($_SESSION['rol'] === 'estudiante') {
    header("Location: ../../../sites/estudiantes/home");
    exit();
}


?>