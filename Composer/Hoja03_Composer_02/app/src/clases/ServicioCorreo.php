<?php

namespace App\Correo;

class ServicioCorreo {

    public function __construct(private InterfazProveedorCorreo $proveedorCorreo) {  
    }

    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool {
        return $this->proveedorCorreo->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
    }
}
