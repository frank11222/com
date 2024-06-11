<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario de inicio de sesión
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar credenciales
    if ($nombre === 'frank' && $email === 'frankpineda@gmail.com' && $password === 'frank') {
        // Credenciales válidas, iniciar sesión y redirigir a la página de la aplicación
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre'] = $nombre;
        header("Location: aplicacion.php"); // Cambio de la página de destino
        exit; // Es importante salir del script después de redirigir
    } else {
        // Credenciales inválidas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
        header("Location: iniciar.html");
        exit; // Es importante salir del script después de redirigir
    }
}
?>
