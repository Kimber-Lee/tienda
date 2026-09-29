<?php
class Pedido {
    private $descripcion;
    private $tipoPedido;
    private $producto;
    private $unidades;
    private $observaciones;

    private $idPedido;
    private $estado;
    private $totalBase;

    public function __construct($descripcion, $tipoPedido, $producto, $unidades, $observaciones) {

        $this->descripcion = $descripcion;
        $this->tipoPedido = $tipoPedido;
        $this->producto = $producto;
        $this->unidades = $unidades;
        $this->observaciones = $observaciones;

        $this->idPedido = rand(1000, 9999);
        $this->estado = 'Pendiente';
        $this->totalBase = 0; 
    }

    public function mostrarResumenPedido() {

        return "<p><strong>Producto:</strong> {$this->producto}</p>" .
               "<p><strong>Unidades:</strong> {$this->unidades}</p>" .
               "<p><strong>Tipo de Envío:</strong> {$this->tipoPedido}</p>" .
               "<p><strong>Descripción:</strong> {$this->descripcion}</p>" .
               "<p><strong>Observaciones:</strong> {$this->observaciones}</p>";
    }


    public function actualizarEstado($nuevoEstado) {
        $estadosPermitidos = ['Pendiente', 'Pagado', 'En Preparación', 'Enviado', 'Entregado', 'Cancelado'];
        
        // trim() para evitar fallos por espacios accidentales y comparación estricta en in_array
        $estadoLimpio = trim($nuevoEstado);
        if (in_array($estadoLimpio, $estadosPermitidos, true)) {
            $this->estado = $estadoLimpio;
            return true;
        }
        return false;
    }

    public function setTotalBase(float $monto) {
        $this->totalBase = $monto;
    }


    public function calcularTotalConImpuesto(float $tasa = 0.19): float {
        if ($this->totalBase <= 0) {
            return 0.0;
        }
        return round($this->totalBase * (1 + $tasa), 2);
    }
}
?>