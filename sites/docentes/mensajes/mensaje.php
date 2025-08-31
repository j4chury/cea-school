<?php
session_start();
include('../../../includes/bypassfordoc.php');
include('../../../includes/mensajecount.php');

$conexion = new mysqli("localhost", "...", "...", "...");

$id = intval($_GET['id']);
$idUsuario = $_SESSION['id'];

$sql = "
    SELECT m.titulo, m.contenido, m.fecha,
           CONCAT(u.nombres, ' ', u.apellidos) AS remitente
    FROM mensajes m
    INNER JOIN usuarios u ON m.remitente = u.id
    WHERE m.id = $id
      AND m.destinatario = $idUsuario
";

$resultado = $conexion->query($sql);

if ($resultado->num_rows === 0) {
    header('Location: ../mensajes');
}

$mensaje = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes | CEA School</title>
    <link rel="stylesheet" href="../../../public/css/mensajes/docmensajes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0"/>
    <link rel="icon" href="../../../public/img/logo.png">
</head>
<body>
    <nav class="site-nav">
        <button class="sidebar-toggle">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </nav>
    
        <div class="container">
        <aside class="sidebar collapsed">


            <header class="sidebar-header">
                <div class="sidebar-title">
                    <span class="cea">CEA</span> <span class="school">School</span>
                </div>
                <button class="sidebar-toggle">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
            </header>

            <div class="sidebar-content">
                <form action="#" class="search-form">
                    <span class="material-symbols-outlined">search</span>
                    <input type="search" placeholder="Busca..." required>
                </form>

                <ul class="menu-list">
                    <li class="menu-item">
                        <a href="/" class="menu-link">
                            <span class="material-symbols-outlined">dashboard</span>
                            <span class="menu-label">Inicio</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../notas/index.html" class="menu-link">
                            <span class="material-symbols-outlined">insert_chart</span>
                            <span class="menu-label">Cargar notas</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../mensajes" class="menu-link active">
                            <span class="icon-wrapper">
                                <span class="material-symbols-outlined">notifications</span>
                                <span class="badge"><?=htmlspecialchars($mensajes_t)?></span>
                            </span>
                            <span class="menu-label">Mensajes</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../circulares/index.html" class="menu-link">
                            <span class="material-symbols-outlined">star</span>
                            <span class="menu-label">Circulares</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../circulares/index.html" class="menu-link">
                            <span class="material-symbols-outlined">star_rate_half</span>
                            <span class="menu-label">Observador</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../menu/index.html" class="menu-link">
                            <span class="material-symbols-outlined">block</span>
                            <span class="menu-label">Inasistencias</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../perfil/index.html" class="menu-link">
                            <span class="material-symbols-outlined">group</span>
                            <span class="menu-label">Mi perfil</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../configuracion/index.html" class="menu-link">
                            <span class="material-symbols-outlined">settings</span>
                            <span class="menu-label">Configuración</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <button onclick="window.location.href='../../../controllers/logout.php'" class="logout">
                    <div class="logout-label">
                        <span class="logout-icon material-symbols-outlined">logout</span>
                    </div>
                </button>
            </div>
        </aside>

        <div class="mensaje-detalle">
            <h2><?= htmlspecialchars($mensaje['titulo']) ?></h2>
            <p><strong>De:</strong> <?= htmlspecialchars($mensaje['remitente']) ?></p>
            <p><strong>Fecha:</strong> <?= date("d M Y H:i", strtotime($mensaje['fecha'])) ?></p>
            <hr>
            <p class="contenido-texto"><?= nl2br(htmlspecialchars($mensaje['contenido'])) ?></p>
            <button onclick="window.location.href='../mensajes'">Volver</button>
        </div>


<!-- Navbar script -->
<script src="../../../public/js/navbar.js"></script>

</body>
</html>