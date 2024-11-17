<?php
namespace App\Clases;
class Electronica extends Producto
{
    private $plazoGarantia;
   


    public function __construct($plazoGarantia,$codigo,$precio,$nombre,$categoria)
    {
        parent::__construct($codigo,$precio,$nombre,$categoria);
        $this->plazoGarantia=$plazoGarantia;
       
    }

    public function __tostring()
    {
        return parent::__tostring().
        'Plazo de garantia: '.$this->plazoGarantia.'\n';
    }
}
?>