<?php session_start();
include('../../../includes/bypassfordoc.php');
include('../../../includes/mensajecount.php');

$mysqli = new mysqli("localhost", "...", "...", "...");

if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

$sql = "
    SELECT m.id, m.titulo, m.contenido, m.fecha, m.remitente, m.destinatario, 
    u.nombres, u.apellidos 
    FROM mensajes m 
    INNER JOIN usuarios u ON m.remitente = u.id 
    ORDER BY m.fecha DESC
";
$resultado = $mysqli->query($sql);
if (!$resultado) {
    die("Error en la consulta: " . $mysqli->error);
}
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
        <!-- Contenido principal -->
        <div class="mensajes">
            <h3 class="msg-titulo">Bandeja de entrada</h3>
            <?php while($row = $resultado->fetch_assoc()): ?>
                <?php if ((int)$row['destinatario'] !== (int)$_SESSION['id']) continue; ?>
                <a href="mensaje.php?id=<?= $row['id'] ?>" class="mensaje">
                    <img src="https://ui-avatars.com/api/?name=<?=$row['nombres']?>&size=128&background=random" class="avatar"/>
                    <div class="contenido">
                        <p class="titulo"><?= htmlspecialchars($row['titulo']) ?></p>
                        <p class="autor"><?= htmlspecialchars(strtok($row['nombres'], " ") . ' ' . $row['apellidos']) ?></p>
                    </div>
                    <p class="fecha">
                        <?= date("d M", strtotime($row['fecha'])) ?>
                    </p>
                </a>
            <?php endwhile; ?>
        </div>

    <div class="footer">
        <a href="send.php">
            <p>Enviar mensajes</p>
        </a>
    </div>


<!-- Navbar script -->
<script src="../../../public/js/navbar.js"></script>

</body>
</html>

<?php
$mysqli->close();
?>