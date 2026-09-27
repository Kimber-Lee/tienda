<?php
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre    = htmlspecialchars(trim($_POST['nombre']));
    $email     = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $direccion = htmlspecialchars(trim($_POST['direccion']));

    if (empty($nombre) || !$email || empty($direccion)) {
        die("<p style='color:red;'>Error: Complete todos los campos e introduzca un correo electrónico válido.</p>");
    }

    $sql = "INSERT INTO CLIENTE (nombre, email, direccion) 
            VALUES ('$nombre', '$email', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='font-family:Arial; padding:20px; border:1px solid #4CAF50; margin:20px;'>";
        echo "<h2 style='color:#4CAF50;'>¡Cliente guardado exitosamente en TIENDA!</h2>";
        echo "<p><strong>Nombre:</strong> $nombre | <strong>Email:</strong> $email | <strong>Dirección:</strong> $direccion</p>";
        echo "<a href='../admin.php'>Volver al Panel</a> | <a href='../reporte_tablas.php'>Consultar Tablas</a>";
        echo "</div>";
    } else {
        echo "<p style='color:red;'>Error SQL: " . $conn->error . "</p>";
    }
    $conn->close();
}
?>