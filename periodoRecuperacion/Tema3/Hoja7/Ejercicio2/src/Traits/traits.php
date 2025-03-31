<?php
namespace MiProyecto\Traits;

trait Traits{
    function obtener($campo){
         return $this->$campo;
    }

     function cambiar($campo,$valor){
         $this->$campo=$valor;
     }

}
?>