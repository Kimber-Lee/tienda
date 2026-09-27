<?php
require_once 'dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente  = (int)$_POST['id_cliente'];
    $id_producto = (int)$_POST['id_producto'];
    $cantidad    = (int)$_POST['cantidad'];

    $sql_stock = "SELECT nombre, precio, stock FROM PRODUCTO WHERE id_producto = $id_producto";
    $res_stock = $conn->query($sql_stock);

    if ($res_stock && $res_stock->num_rows > 0) {
        $prod = $res_stock->fetch_assoc();

        if ($prod['stock'] < $cantidad) {
            die("<div style='color:red; font-family:Arial; padding:20px; border:1px solid red;'>" .
                "<h3>Transacción Rechazada: Quiebre de Stock</h3>" .
                "<p>El artículo '{$prod['nombre']}' dispone de {$prod['stock']} unidades (Solicitadas: $cantidad).</p>" .
                "<a href='../index.php'>Volver al Catálogo</a></div>");
        }

        $total = $prod['precio'] * $cantidad;
        $sql_compra = "INSERT INTO COMPRA (cantidad, total, fecha, id_producto, id_cliente) 
                       VALUES ($cantidad, $total, NOW(), $id_producto, $id_cliente)";

        if ($conn->query($sql_compra) === TRUE) {
            $nuevo_stock = $prod['stock'] - $cantidad;
            $conn->query("UPDATE PRODUCTO SET stock = $nuevo_stock WHERE id_producto = $id_producto");

            echo "<div style='font-family:Arial; padding:20px; border:1px solid #4CAF50; margin:20px;'>" .
                 "<h2 style='color:#4CAF50;'>¡Transacción Completada!</h2>" .
                 "<p>Artículo: {$prod['nombre']} | Cantidad: $cantidad | Total: $$total</p>" .
                 "<p>Stock actualizado: $nuevo_stock unidades.</p>" .
                 "<a href='../compras_avanzadas.php'>Ver Reporte Avanzado</a></div>";
        }
    }
    $conn->close();
}
?>