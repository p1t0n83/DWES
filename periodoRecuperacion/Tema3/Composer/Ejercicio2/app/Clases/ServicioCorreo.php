<?php
namespace App\Clases;


use App\Interfaces\InterfazProveedorCorreo;

class ServicioCorreo {

    private InterfazProveedorCorreo $interfaz;

       public function __construct(InterfazProveedorCorreo $interfaz)
       {
            $this->interfaz=$interfaz;    
       }

       public function enviarCorreo(string $paraQuien,string $asunto,string $cuerpoMensaje){
        return $this->interfaz->enviarCorreo($paraQuien,$asunto,$cuerpoMensaje);

       }
}
