<?php
class Pedido {
    private $descripcion;
    private $tipoPedido;
    private $producto;
    private $unidades;
    private $observaciones;

    public function __construct($descripcion, $tipoPedido, $producto, $unidades, $observaciones) {
        $this->descripcion = $descripcion;
        $this->tipoPedido = $tipoPedido;
        $this->producto = $producto;
        $this->unidades = $unidades;
        $this->observaciones = $observaciones;
    }

    public function mostrarResumenPedido() {
        return "<p><strong>Producto:</strong> {$this->producto}</p>" .
               "<p><strong>Unidades:</strong> {$this->unidades}</p>" .
               "<p><strong>Tipo de Envío:</strong> {$this->tipoPedido}</p>" .
               "<p><strong>Descripción:</strong> {$this->descripcion}</p>" .
               "<p><strong>Observaciones:</strong> {$this->observaciones}</p>";
    }
}
?>