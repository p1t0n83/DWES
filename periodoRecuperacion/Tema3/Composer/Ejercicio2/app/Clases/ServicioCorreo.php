<?php
namespace App\Clases;


use App\Interfaces\InterfazProveedorCorreo;

class ServicioCorreo {


       public function __construct(private readonly InterfazProveedorCorreo $interfaz){ 
       }

       public function enviarCorreo(string $paraQuien,string $asunto,string $cuerpoMensaje){
        return $this->interfaz->enviarCorreo($paraQuien,$asunto,$cuerpoMensaje);

       }
}
