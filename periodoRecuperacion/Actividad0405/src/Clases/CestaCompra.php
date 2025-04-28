<?php
namespace Ejercicio0405\Clases;

class CestaCompra {
    private $cesta;

    function __construct() {
        $this->cesta = [];
    }

    // Añadir un nuevo artículo a la cesta
    function nuevoArticulo($producto) {
        $this->cesta[] = $producto;
    }

    // Obtener todos los productos de la cesta
    function getProductos() {
        return $this->cesta;
    }

    // Calcular el coste total de la cesta
    function getCoste() {
        $total = 0;
        foreach ($this->cesta as $producto) {
            $total += $producto['precio'];
        }
        return $total;
    }

    // Verificar si la cesta está vacía
    function estaVacia() {
        return empty($this->cesta);
    }

    // Guardar la cesta en la sesión
    function guardarCesta() {
        $_SESSION['cesta'] = serialize($this);
    }

    // Cargar la cesta desde la sesión
    static function carga_cesta() {
        if (isset($_SESSION['cesta']) && is_string($_SESSION['cesta'])) {
            return unserialize($_SESSION['cesta']);
        }
        return new CestaCompra();
    }
}
?>