<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - TIENDA</title>
    <link rel="stylesheet" href="assets/style.css">
    <script>
    
        function validarProducto() {
            let nombre = document.getElementById('prod_nombre').value.trim();
            let desc = document.getElementById('prod_desc').value.trim();
            let precio = document.getElementById('prod_precio').value;
            let stock = document.getElementById('prod_stock').value;

            if (nombre === '' || desc === '' || precio === '' || stock === '') {
                alert('Atención: Todos los campos del Producto son estrictamente obligatorios.');
                return false;
            }
            if (precio <= 0 || stock < 0) {
                alert('Atención: El precio debe ser mayor a 0 y el stock no puede ser negativo.');
                return false;
            }
            return true;
        }

        function validarCliente() {
            let nombre = document.getElementById('cli_nombre').value.trim();
            let email = document.getElementById('cli_email').value.trim();
            let direccion = document.getElementById('cli_direccion').value.trim();

            if (nombre === '' || email === '' || direccion === '') {
                alert('Atención: Debe completar todos los campos del Cliente.');
                return false;
            }
            let patronEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!patronEmail.test(email)) {
                alert('Atención: Ingrese un formato de correo electrónico válido.');
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="header">
        <h2>Panel Administrativo: Gestión de Entidades</h2>
        <a href="index.php" class="btn-agregar" style="text-decoration:none; display:inline-block; width:auto;">Volver al Catálogo</a>
    </div>

    <div class="forms">
        
        <div class="form-container">
            <h2>Registro de Producto</h2>
            <form action="utils/guardar_producto.php" method="POST" onsubmit="return validarProducto();">
                <div class="body-form">
                    <label for="prod_nombre">Nombre:</label>
                    <input type="text" id="prod_nombre" name="nombre" placeholder="Ej. Notebook Pro" required><br><br>

                    <label for="prod_desc">Descripción:</label>
                    <textarea id="prod_desc" name="descripcion" rows="3" placeholder="Especificaciones..." required></textarea><br><br>

                    <label for="prod_precio">Precio ($):</label>
                    <input type="number" id="prod_precio" name="precio" min="1" required><br><br>

                    <label for="prod_stock">Stock inicial:</label>
                    <input type="number" id="prod_stock" name="stock" min="0" required><br><br>
                </div>
                <input type="submit" class="btn-agregar" value="Guardar Producto en BD">
            </form>
        </div>

        <div class="form-container">
            <h2>Registro de Cliente</h2>
            <form action="utils/guardar_cliente.php" method="POST" onsubmit="return validarCliente();">
                <div class="body-form">
                    <label for="cli_nombre">Nombre Completo:</label>
                    <input type="text" id="cli_nombre" name="nombre" placeholder="Ej. Carlos Mendoza" required><br><br>

                    <label for="cli_email">Correo Electrónico:</label>
                    <input type="email" id="cli_email" name="email" placeholder="carlos.m@correo.cl" required><br><br>

                    <label for="cli_direccion">Dirección Postal:</label>
                    <input type="text" id="cli_direccion" name="direccion" placeholder="Av. Las Condes 450" required><br><br>
                </div>
                <input type="submit" class="btn-agregar" value="Guardar Cliente en BD">
            </form>
        </div>
    </div>
</body>
</html>