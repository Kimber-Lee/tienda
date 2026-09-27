<?php
function procesarResena($idProducto, $calificacion, $comentario) {
    $comentarioLimpio = htmlspecialchars(trim($comentario)); 
    $calificacionValida = (int)$calificacion;
    
    if($calificacionValida >= 1 && $calificacionValida <= 5 && !empty($comentarioLimpio)) {
        return "<h3>Reseña guardada exitosamente</h3><p>Producto ID: " . $idProducto . "</p><p>Calificación: " . $calificacionValida . "/5</p>";
    } else {
        return "<h3 style='color:red;'>Error: Datos de reseña inválidos.</h3>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo procesarResena($_POST['id_producto'], $_POST['calificacion'], $_POST['comentario']);
    echo "<br><a href='index.php'>Volver a la tienda</a>";
}else {
    echo "Método de envío no autorizado.";
}
?>