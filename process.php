<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Credenciales de conexión a la base de datos
    $host = "localhost";
    $username = "root";
    $password = "123456";
    $dbname = "FRANK2";

    // Crear la conexión
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    if (isset($_POST["insertar"])) {
        $productName = mysqli_real_escape_string($conn, $_POST["productName"]);
        $productPrice = $_POST["productPrice"];
        $productQuantity = $_POST["productQuantity"];
        $productUnit = mysqli_real_escape_string($conn, $_POST["productUnit"]);
        $productBrand = mysqli_real_escape_string($conn, $_POST["productBrand"]);
        
        // Manejar productLitro como NULL si está vacío
        $productLitro = isset($_POST["productLitro"]) ? $_POST["productLitro"] : "NULL";

        // Query de inserción
        $sql = "INSERT INTO productos (nombre_producto, precio, cantidad, unidad, litro, marca) VALUES ('$productName', $productPrice, $productQuantity, '$productUnit', $productLitro, '$productBrand')";

        // Ejecutar la consulta
        if (mysqli_query($conn, $sql)) {
            echo "Producto insertado correctamente";
        } else {
            echo "Error al insertar el producto: " . mysqli_error($conn);
        }
    }

    if (isset($_POST["eliminar"])) {
        // Query de eliminación
        $sql = "DELETE FROM productos";

        // Ejecutar la consulta
        if (mysqli_query($conn, $sql)) {
            echo "Todos los productos han sido eliminados correctamente";
        } else {
            echo "Error al eliminar los productos: " . mysqli_error($conn);
        }
    }

    if (isset($_POST["modificar"])) {
        // Obtener los datos del formulario
        $productName = mysqli_real_escape_string($conn, $_POST["productName"]);
        $productPrice = $_POST["productPrice"];
        $productQuantity = $_POST["productQuantity"];
        $productUnit = mysqli_real_escape_string($conn, $_POST["productUnit"]);
        $productBrand = mysqli_real_escape_string($conn, $_POST["productBrand"]);
        $productLitro = isset($_POST["productLitro"]) ? $_POST["productLitro"] : "NULL";

        // Query de actualización
        $sql = "UPDATE productos SET nombre_producto = '$productName', precio = $productPrice, cantidad = $productQuantity, unidad = '$productUnit', litro = $productLitro, marca = '$productBrand'";

        // Ejecutar la consulta
        if (mysqli_query($conn, $sql)) {
            echo "Todos los productos han sido modificados correctamente";
        } else {
            echo "Error al modificar los productos: " . mysqli_error($conn);
        }
    }

    if (isset($_POST["seleccionar"])) {
        // Query de selección
        $sql = "SELECT * FROM productos";

        // Ejecutar la consulta
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Procesar los resultados
            while ($row = mysqli_fetch_assoc($result)) {
                // Mostrar los detalles del producto seleccionado
                echo "Nombre Producto: " . $row["nombre_producto"] . "<br>";
                echo "Precio: " . $row["precio"] . "<br>";
                echo "Cantidad: " . $row["cantidad"] . "<br>";
                echo "Unidad: " . $row["unidad"] . "<br>";
                echo "Litro: " . $row["litro"] . "<br>";
                echo "Marca: " . $row["marca"] . "<br>";
                echo "<br>";
            }
        } else {
            echo "Error al seleccionar los productos: " . mysqli_error($conn);
        }
    }

    // Cerrar la conexión
    mysqli_close($conn);
}

// Consultar y mostrar todos los productos
// Crear nuevamente la conexión
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Query de selección
$sql = "SELECT * FROM productos";

// Ejecutar la consulta
$result = mysqli_query($conn, $sql);

if ($result) {
    // Mostrar los resultados en una tabla
    echo "<table border='1'>";
    echo "<tr><th>Nombre Producto</th><th>Precio</th><th>Cantidad</th><th>Unidad</th><th>Litro</th><th>Marca</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["nombre_producto"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["cantidad"] . "</td>";
        echo "<td>" . $row["unidad"] . "</td>";
        echo "<td>" . $row["litro"] . "</td>";
        echo "<td>" . $row["marca"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Error al seleccionar los productos: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
