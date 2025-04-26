<?php
namespace App\clases;

use App\clases\Producto;

class Electronica extends Producto
{
    private $plazoGarantia;

    public function __construct($codigo, $precio, $nombre, $categoria, $plazoGarantia)
    {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->plazoGarantia = $plazoGarantia;
    }

    public function __toString()
    {
        return parent::__toString() . ", Plazo de Garantía: {$this->plazoGarantia} meses";
    }
}
?>