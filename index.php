<?php 
session_start(); 

$totalArticulos = 0;
if (isset($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $id => $cantidad) {
        $totalArticulos += $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda Comercio Electrónico</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    <div id="notificacion-promocion" style="opacity: 0; background:#ffeb3b; padding:10px; text-align:center;">
        <strong>¡Descuento relámpago!</strong> 20% OFF en Tecnología.
    </div>
    
    <div class="header">
        <h3>Mi Carrito: <span id="contador-carrito"><?php echo $totalArticulos; ?></span> artículos</h3>
        <a href="carrito.php" class="btn-agregar" style="text-decoration:none; display:inline-block; width: auto;">Ver Carrito</a>
    </div>

    <div class="search-container">
        <input type="text" id="search-input" placeholder="Buscar productos...">
        <select id="category-filter">
            <option value="todas">Todas las categorías</option>
            <option value="tecnología">Tecnología</option>
            <option value="hogar">Hogar</option>
        </select>
        <button id="search-button">Buscar</button>
    </div>
    
    <div id="results-container"></div>

    <?php require_once('componentes/forms.php'); ?>

    <script src="assets/app.js"></script>
</body>
</html>


    <?php require_once('utils/dbconnection.php'); ?>
