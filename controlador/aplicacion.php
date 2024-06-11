<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si el usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: ../vista/iniciar.html");
    exit;
}

// Verificar si el usuario es "frank" para asegurar el acceso
if ($_SESSION['nombre'] !== 'frank') {
    // Si el usuario no es "frank", redirigir a una página de acceso no autorizado
    header("Location: ../vista/iniciar.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
</head>
<body>
    <h1>Ingresar Producto</h1>
    <form method="post" action="process.php">
        <label for="productName">Nombre del Producto:</label>
        <input type="text" id="productName" name="productName"><br><br>

        <label for="productPrice">Precio:</label>
        <input type="number" id="productPrice" name="productPrice" step="0.01"><br><br>

        <label for="productQuantity">Cantidad:</label>
        <input type="number" id="productQuantity" name="productQuantity"><br><br>

        <label for="productUnit">Unidad:</label>
        <select id="productUnit" name="productUnit">
            <option value="Litro">Litro</option>
            <option value="Unidad">Unidad</option>
        </select><br><br>

        <label for="productBrand">Marca:</label>
        <input type="text" id="productBrand" name="productBrand"><br><br>

        <label for="productLitro">Litro:</label>
        <input type="number" id="productLitro" name="productLitro" step="0.01"><br><br>

        <input type="submit" name="insertar" value="Insertar">
        <input type="submit" name="eliminar" value="Eliminar">
        <input type="submit" name="modificar" value="Modificar">
        <input type="submit" name="seleccionar" value="Seleccionar">
    </form>
</body>
</html>

