<?php
require_once 'utils/Pedido.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $producto_post = $_POST['producto'];
    $unidades_post = $_POST['unidades'];
    $tipoPedido_post = $_POST['tipoPedido'];
    $descripcion_post = $_POST['descripcion'];
    $observaciones_post = $_POST['observaciones'];

    if (empty($producto_post) || empty($unidades_post)) {
        echo "<p style='color:red;'>Error: Faltan campos obligatorios para el pedido.</p>";
    } else {
        $nuevoPedido = new Pedido($descripcion_post, $tipoPedido_post, $producto_post, $unidades_post, $observaciones_post);
        echo "<div style='border: 1px solid #4CAF50; padding: 15px;'>";
        echo "<h2>¡Pedido procesado con éxito!</h2>";
        echo $nuevoPedido->mostrarResumenPedido();
        echo "</div>";
    }
    echo "<br><a href='index.php'>Volver a la tienda</a>";
} else {
    echo "Método de envío no autorizado.";
}
?>