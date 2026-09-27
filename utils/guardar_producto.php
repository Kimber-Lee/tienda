<?php
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre      = htmlspecialchars(trim($_POST['nombre']));
    $descripcion = htmlspecialchars(trim($_POST['descripcion']));
    $precio      = (int)$_POST['precio'];
    $stock       = (int)$_POST['stock'];

    if (empty($nombre) || empty($descripcion) || $precio <= 0 || $stock < 0) {
        die("<p style='color:red;'>Error de validación en PHP: Parámetros incorrectos.</p>");
    }

    $sql = "INSERT INTO PRODUCTO (nombre, descripcion, precio, stock) 
            VALUES ('$nombre', '$descripcion', $precio, $stock)";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='font-family:Arial; padding:20px; border:1px solid #4CAF50; margin:20px;'>";
        echo "<h2 style='color:#4CAF50;'>¡Producto guardado exitosamente en TIENDA!</h2>";
        echo "<p><strong>Artículo:</strong> $nombre | <strong>Precio:</strong> $$precio | <strong>Stock:</strong> $stock</p>";
        echo "<a href='../admin.php'>Volver al Panel</a> | <a href='../reporte_tablas.php'>Consultar Tablas</a>";
        echo "</div>";
    } else {
        echo "<p style='color:red;'>Error SQL: " . $conn->error . "</p>";
    }
    $conn->close();
}
?>