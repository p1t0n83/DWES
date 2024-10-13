<?php

namespace App\Correo;

interface InterfazProveedorCorreo {
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool;
}
