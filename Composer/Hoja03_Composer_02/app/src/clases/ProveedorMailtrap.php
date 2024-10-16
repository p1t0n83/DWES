<?php

namespace App\Clases;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Interfaces\InterfazProveedorCorreo;


class ProveedorMailtrap implements InterfazProveedorCorreo
{
    function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {

        // Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
        $mail = new PHPMailer(true);

        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
        $mail->isSMTP();                                      // Establece el tipo de correo electrónico para usar SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';                     // Especifica los servidores SMTP principales y de respaldo
        $mail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $mail->Username = 'c6fe4aff36959a';                   // Nombre de usuario SMTP
        $mail->Password = '********41e8';                   // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
        $mail->Port = 2525;                                    // Puerto TCP para conectarse

        try {
            // Configura y envía el mensaje
            $mail->setFrom('igarciai02@educantabria.es', 'Iker Garcia');
            $mail->addAddress($paraQuien);
            $mail->Subject = $asunto;
            $mail->Body = $cuerpoMensaje;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error de correo: ' . $mail->ErrorInfo;
            return false;
        }
    }

}
?>