<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar credenciales
    if ($nombre === 'frank' && $email === 'frankpineda@gmail.com' && $password === 'frank') {
        // Credenciales válidas, iniciar sesión y redirigir a la página de la aplicación
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre'] = $nombre;
        header("Location: ../controlador/aplicacion.php"); // Cambio de la página de destino
        exit; // Es importante salir del script después de redirigir
    } else {
        // Credenciales inválidas, redirigir de nuevo al formulario de inicio de sesión con un mensaje de error
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos";
        header("Location:../vista/iniciar.html");
        exit; // Es importante salir del script después de redirigir
    }
}

// Código para la conexión a la base de datos y registro de nuevos usuarios
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "FRANK2";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "INICIO SE SESION EXITOSO.";
    } else {
        echo "Error al registrar los datos: " . $conn->error;
    }
}

$conn->close();
?>
