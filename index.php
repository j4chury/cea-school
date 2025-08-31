<?php
session_start();

if (isset($_SESSION['usuario'])) {
    # Ya existe una sesión activa.
    header("Location: ./controllers/current.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar sesión | CEA School</title>
  <link rel="stylesheet" href="public/css/login/login.css">
  <link rel="icon" href="public/img/logo.png">
</head>
<body>
  <div class="login_form">
    <form action="./controllers/login.php" method="POST">
      <h3>Inicia sesión</h3>
      <div class="input_box">
        <label for="usuario">Usuario</label>
        <input type="text" id="usuario" name="documento" placeholder="Ingresa tu usuario" required />
      </div>
      <div class="input_box">
        <div class="password_title">
          <label for="contraseña">Contraseña</label>
        </div>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" required />
      </div>
      <button type="submit">Log In</button>
    </form>
  </div>
</body>
</html>