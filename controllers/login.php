<?php
session_start();

$host = 'localhost';
$user = '...';
$pass = "...";
$db = "...";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error en la conexión");
} 

$documento = $_POST['documento'];
$password = $_POST['contraseña'];

$sql = "SELECT * FROM usuarios WHERE documento = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $documento);
$stmt->execute();
$result = $stmt->get_result();

if ($result ->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    if (...) {
        $_SESSION['usuario'] = $usuario['documento'];
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['nombres'] = $usuario['nombres'];
        $_SESSION['id'] = $usuario['id'];

        if($usuario['rol'] === 'estudiante') {
            # Estudiante
            header("Location: ../sites/estudiantes/home");
        } else if ($usuario['rol'] === 'docente') {
            # Docente
            header("Location: ../sites/docentes/home");
        }
        exit();
    } else {
        # Error
        echo "Credenciales incorrectas.";
    }
} else {
    # Error
    echo "Credenciales incorrectas.";

}

$stmt->close();
$conn->close();

?>
