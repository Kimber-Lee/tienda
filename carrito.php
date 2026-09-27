<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Carrito</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div class="form-container" style="margin: 40px auto; width: 60%;">
        <h2>Resumen del Carrito de Compras</h2>
        <?php
            if (empty($_SESSION['carrito'])) {
                echo "<p>El carrito está vacío</p>";
            } else {
                echo "<ul>";
                    foreach ($_SESSION['carrito'] as $productoId => $cantidad) {
                        echo "<li style='margin-bottom: 15px;'>Producto ID: <strong>" . $productoId . "</strong> | Cantidad: <strong>" . $cantidad . "</strong> ";
                        echo " <a href='utils/utils.php?id=" . $productoId . "' style='color:red; margin-left: 15px;'>[Eliminar]</a></li>";
                    }
                echo "</ul>";
                echo "<button class='btn-agregar listo-pago'>Proceder al Pago Seguro</button>";
            }
        ?>
        <br><br>
        <a href="index.php" class="btn-agregar" style="text-decoration:none; display:inline-block; text-align:center;">Seguir Comprando</a>
    </div>
    
    <script>
        document.querySelector('.listo-pago').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Tu pedido ha sido procesado exitosamente');
            window.location.href = 'utils/utils.php?vaciar=1';
        });
    </script>
</body>
</html>