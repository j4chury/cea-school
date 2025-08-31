<?php
session_start();
include('../../../includes/bypassforest.php');
include('../../../includes/mensajecount.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | CEA School</title>
    <link rel="stylesheet" href="../../../public/css/home/esthome.css">
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
                        <a href="/" class="menu-link active">
                            <span class="material-symbols-outlined">dashboard</span>
                            <span class="menu-label">Inicio</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../notas/index.html" class="menu-link">
                            <span class="material-symbols-outlined">insert_chart</span>
                            <span class="menu-label">Notas</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="../mensajes" class="menu-link">
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

        <div class="main-content">
            <h1 class="page-title">CEA School - Empresarial de los Andes</h1>
            
            <p class="card">Bienvenido de vuelta, <?php echo $_SESSION['nombres']; ?>. Aquí hay información de interés: <span class="material-symbols-outlined pin">keep</span></p>

            <!-- Información de interés -->

            <div class="new-info">
                <div class="messages">
                    <span class="material-symbols-outlined">inbox</span>
                    <p id="new_msgs">Tienes <?=htmlspecialchars($mensajes_t)?>  mensajes nuevos.</p>
                </div>
                <div class="circular">
                    <span class="material-symbols-outlined">file_open</span>
                    <p id="circular">Circular No. 46 NUEVA PLATAFORMA ESCOLAR</p>
                </div>
            </div>

            <!-- Novedades -->
            <div class="news-section">
                <div class="title">
                    <h2 class="noticias">NOTICIAS</h2>
                    <h2 class="institucionales">INSTITUCIONALES</h2>
                </div>
                <div class="news-cards">
                    <div class="news-card">
                        <img src="../../../public/img/admisiones-abiertas.jpg" alt="Admisiones Abiertas 2026" class="news-image">
                        <div class="news-info">
                            <h3>Admisiones Abiertas 2026</h3>
                            <p class="publish-date">Publicado: 18 agosto, 2025</p>
                            <p>Escríbenos y separa ya tu cupo... Adquiere tu formulario a partir del 1 de septiembre del 2025...</p>
                            <a href="https://www.colegioempresarialdelosandes.edu.co/admisiones-abiertas-2026/" class="read-more">Leer Más →</a>
                        </div>
                    </div>
                    <div class="news-card">
                        <img src="../../../public/img/20-de-julio-2025-thumb.jpg" alt="Celebración 20 de Julio" class="news-image">
                        <div class="news-info">
                            <h3>Celebración 20 de Julio</h3>
                            <p class="publish-date">Publicado: 20 Julio, 2025</p>
                            <p>Celebramos con orgullo el 20 de julio, un día que nos recuerda la fuerza, la historia y el espíritu de...</p>
                            <a href="https://www.colegioempresarialdelosandes.edu.co/celebracion-20-de-julio-2025/" class="read-more">Leer Más →</a>
                        </div>
                    </div>
                    <div class="news-card">
                        <img src="../../../public/img/inauguracion-juegos-junio-2025-thumb.jpg" alt="inauguracion" class="news-image">
                        <div class="news-info">
                            <h3>Intercolegiados</h3>
                            <p class="publish-date">Publicado: 9 Julio, 2025</p>
                            <p>Así se vivimos en el CEA la gran inauguración de los juegos intercolegiados!!</p>
                            <a href="https://www.colegioempresarialdelosandes.edu.co/inauguracion-juegos-intercolegiados-2025/" class="read-more">Leer Más →</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<!-- Navbar script -->
<script src="../../../public/js/navbar.js"></script>
<!-- Home script -->
<script src="../../../public/js/esthome.js"></script>

</body>
</html>

