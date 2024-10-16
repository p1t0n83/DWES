<?php
namespace App\Interfaces;
interface  InterfazProveedorCorreo{
    function enviarCorreo(string $paraQuien,string $asunto, string $cuerpoMensaje):bool;
}


?>