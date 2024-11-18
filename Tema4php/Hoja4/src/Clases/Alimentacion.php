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

    public function tostring()
    {
        return parent::tostring().
        'Mes de caducidad: '.$this->mesCaducidad.'<br>
        Año de caducidad: '.$this->anioCaducidad.'<br>';
    }
}
?>