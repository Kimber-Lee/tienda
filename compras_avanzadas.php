<?php
require_once 'utils/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Avanzado de Transacciones - TIENDA</title>
    <link rel="stylesheet" href="assets/style.css">
    <style>
        .panel {
            width: 85%;
            margin: 25px auto;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
        }
        .tabla-reporte {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0 30px 0;
        }
        .tabla-reporte th, .tabla-reporte td {
            border: 1px solid #ddd;
            padding: 8px 12px;
            text-align: left;
        }
        .tabla-reporte th {
            background-color: #4CAF50;
            color: white;
        }
        .tabla-reporte tr:nth-child(even) { background-color: #f9f9f9; }
        .resaltado { background-color: #e8f5e9; font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Auditoría de Compras y Clientes Frecuentes</h2>
        <a href="index.php" class="btn-agregar" style="text-decoration:none; display:inline-block; width:auto;">Regresar a la Tienda</a>
    </div>

    <div class="panel">
        <h3>1. Registro Detallado de Operaciones (Tabla COMPRA)</h3>
        <table class="tabla-reporte">
            <thead>
                <tr>
                    <th>ID Compra</th><th>ID Producto</th><th>ID Cliente</th><th>Cantidad</th><th>Total</th><th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_compras = "SELECT * FROM COMPRA ORDER BY id_compra ASC";
                $res_compras = $conn->query($sql_compras);
                if ($res_compras && $res_compras->num_rows > 0) {
                    while ($fila = $res_compras->fetch_assoc()) {
                        echo "<tr><td>#{$fila['id_compra']}</td><td>Ref: {$fila['id_producto']}</td><td>Ref: {$fila['id_cliente']}</td><td>{$fila['cantidad']}</td><td>$" . number_format($fila['total'], 0, ',', '.') . "</td><td>{$fila['fecha']}</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>

        <h3 style="color:#2e7d32;">2. Consulta Avanzada: Clientes con Más de Dos Compras Registradas</h3>
        <table class="tabla-reporte">
            <thead>
                <tr>
                    <th>ID Cliente</th><th>Nombre Cliente</th><th>Email</th><th>Dirección</th><th>Total Compras</th><th>Monto Acumulado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_avanzada = "SELECT 
                                    c.id_cliente,
                                    c.nombre,
                                    c.email,
                                    c.direccion,
                                    COUNT(co.id_compra) AS total_compras,
                                    SUM(co.total) AS total_acumulado
                                 FROM CLIENTE c
                                 INNER JOIN COMPRA co ON c.id_cliente = co.id_cliente
                                 GROUP BY c.id_cliente, c.nombre, c.email, c.direccion
                                 HAVING COUNT(co.id_compra) > 2
                                 ORDER BY total_compras DESC";

                $res_avanzada = $conn->query($sql_avanzada);

                if ($res_avanzada && $res_avanzada->num_rows > 0) {
                    while ($r = $res_avanzada->fetch_assoc()) {
                        echo "<tr class='resaltado'>";
                        echo "<td>#{$r['id_cliente']}</td><td>{$r['nombre']}</td><td>{$r['email']}</td><td>{$r['direccion']}</td>";
                        echo "<td style='text-align:center;'>{$r['total_compras']} compras</td>";
                        echo "<td>$" . number_format($r['total_acumulado'], 0, ',', '.') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No se hallaron clientes con más de dos compras.</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>