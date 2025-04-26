<?php
namespace App\clases;
use App\clases\Producto;
class Alimentacion extends Producto
{

    private $mesCaducidad;
    private $anioCaducidad;

    function __construct($codigo, $precio, $nombre, $categoria, $mesCaducidad, $anioCaducidad)
    {
        parent::__construct($codigo, $precio, $nombre, $categoria);
        $this->mesCaducidad = $mesCaducidad;
        $this->anioCaducidad = $anioCaducidad;
    }

    function __toString()
    {
        return parent::__toString() . ", Mes de Caducidad: {$this->mesCaducidad}, Año de Caducidad: {$this->anioCaducidad}";
    }
}
?>