<?php

namespace App\Correo;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ProveedorMailtrap implements InterfazProveedorCorreo {
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool {
        // Cargar el autoload de Composer
        require_once __DIR__ . '/../../vendor/autoload.php'; 

        $phpmailer = new PHPMailer();

        try {
            // Configuración de Mailtrap
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '24b48eb7c08f2e'; // Reemplaza con tu usuario de Mailtrap
            $phpmailer->Password = 'e14dac8e7acdd8'; // Reemplaza con tu contraseña de Mailtrap

            // Remitente y destinatario
            $phpmailer->setFrom('noreply@tudominio.com', 'Nombre Remitente');
            $phpmailer->addAddress($paraQuien);

            // Contenido del correo
            $phpmailer->isHTML(true);
            $phpmailer->Subject = $asunto;
            $phpmailer->Body = $cuerpoMensaje;

            return $phpmailer->send();
        } catch (Exception $e) {
            return false; // En caso de error
        }
    }
}
