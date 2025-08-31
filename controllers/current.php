<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    # No hay sesión activa
    header("Location: ../");
    exit();
}

if ($_SESSION['rol'] === 'estudiante') {
    header("Location: ../sites/estudiantes/home");
    exit();
} else if ($_SESSION['rol'] === 'docente') {
    header("Location: ../sites/docentes/home");
    exit();
}
?>
