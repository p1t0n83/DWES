<?php
namespace App\Interfaces;

interface interfazProveedorCorreo
{
    function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool;
}