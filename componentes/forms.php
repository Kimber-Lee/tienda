<div class="forms">
    <div class="form-container">
        <h2>Registro Formal de Pedido</h2>
        <form action="utils/registrar_pedido.php" method="POST">
            <div class="body-form">

                <label for="producto">Producto:</label>
                <input type="text" id="producto" name="producto" required><br><br>

                <label for="unidades">Unidades:</label>
                <input type="number" id="unidades" name="unidades" min="1" required><br><br>

                <label for="tipoPedido">Tipo de Pedido:</label>
                <select id="tipoPedido" name="tipoPedido">
                    <option value="estandar">Envío Estándar</option>
                    <option value="express">Envío Express</option>
                </select><br><br>

                <label for="descripcion">Descripción del Pedido:</label>
                <input type="text" id="descripcion" name="descripcion" required><br><br>

                <label for="observaciones">Observaciones (Opcional):</label>
                <textarea id="observaciones" name="observaciones" rows="4"></textarea><br><br>
            </div>
            <input type="submit" class="btn-agregar" value="Confirmar Pedido">
        </form>
    </div>

    <div class="form-container">
        <h2>Dejar una reseña del producto</h2>
        <form action="utils/procesar_resena.php" method="POST">
            <label for="id_producto">Selecciona el producto:</label>
            <select id="select-producto-resena" name="id_producto" required>
                <option value="">-- Elige un producto --</option>
            </select>
            <br><br>

            <label for="calificacion">Calificación (1-5):</label>
            <input type="number" id="calificacion" name="calificacion" min="1" max="5" required><br><br>

            <label for="comentario">Comentario:</label>
            <textarea id="comentario" name="comentario" rows="3" required></textarea><br><br>

            <input type="submit" class="btn-agregar" value="Enviar Reseña">
        </form>
    </div>
</div>