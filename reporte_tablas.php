<?php
require_once __DIR__ . '/utils/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta Simple de Tablas - TIENDA</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .tabla-datos {
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
            background: #fff;
        }
        .tabla-datos th, .tabla-datos td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .tabla-datos th {
            background-color: #4CAF50;
            color: white;
        }
        .tabla-datos tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Contenido de Tablas de la Base de Datos TIENDA</h2>
        <a href="admin.php" class="btn-agregar" style="text-decoration:none; display:inline-block; width:auto;">Panel Administrativo</a>
        <a href="index.php" class="btn-agregar" style="text-decoration:none; display:inline-block; width:auto; margin-left:10px;">Ir a la Tienda</a>
    </div>

    <h3 style="text-align:center;">Registros en Tabla: PRODUCTO</h3>
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_prod = "SELECT * FROM PRODUCTO";
            $res_prod = $conn->query($sql_prod);
            if ($res_prod && $res_prod->num_rows > 0) {
                while ($p = $res_prod->fetch_assoc()) {
                    echo "<tr><td>{$p['id_producto']}</td><td>{$p['nombre']}</td><td>{$p['descripcion']}</td><td>$" . number_format($p['precio'], 0, ',', '.') . "</td><td>{$p['stock']} unid.</td></tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Sin registros en PRODUCTO.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h3 style="text-align:center;">Registros en Tabla: CLIENTE</h3>
    <table class="tabla-datos">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Email</th><th>Dirección</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql_cli = "SELECT * FROM CLIENTE";
            $res_cli = $conn->query($sql_cli);
            if ($res_cli && $res_cli->num_rows > 0) {
                while ($c = $res_cli->fetch_assoc()) {
                    echo "<tr><td>{$c['id_cliente']}</td><td>{$c['nombre']}</td><td>{$c['email']}</td><td>{$c['direccion']}</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Sin registros en CLIENTE.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>