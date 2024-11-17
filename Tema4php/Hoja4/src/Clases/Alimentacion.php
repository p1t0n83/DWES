<?php
namespace App\Clases;
class Alimentacion extends Producto
{
    private $mesCaducidad;
    private $anioCaducidad;


    public function __construct($mesCaducidad,$anioCaducidad,$codigo,$precio,$nombre,$categoria)
    {
        parent::__construct($codigo,$precio,$nombre,$categoria);
        $this->mesCaducidad=$mesCaducidad;
        $this->anioCaducidad=$anioCaducidad;
    }

    public function __tostring()
    {
        return parent::__tostring().
        'Mes de caducidad: '.$this->mesCaducidad.'\n
        Año de caducidad: '.$this->anioCaducidad.'\n';
    }
}
?>