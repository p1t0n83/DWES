<?php

namespace App\Clases;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Interfaces\InterfazProveedorCorreo;


class ProveedorMailtrap implements InterfazProveedorCorreo
{
    private PHPMailer $mail;

    function __construct()
    {
        // Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
        $this->mail = new PHPMailer(true);

        // Configuración del servidor
        $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
        $this->mail->isSMTP();                                   // Establece el tipo de correo electrónico para usar SMTP
        $this->mail->Host = 'sandbox.smtp.mailtrap.io';                     // Especifica los servidores SMTP principales y de respaldo
        $this->mail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $this->mail->Username = 'c6fe4aff36959a';                   // Nombre de usuario SMTP
        $this->mail->Password = 'bb43b49a4b41e8';                   // Contraseña SMTP
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
        $this->mail->Port = 25;                                    // Puerto TCP para conectarse
    }
    function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {

        try {
            // Configura y envía el mensaje
            $this->mail->setFrom('igarciai02@educantabria.es', 'Iker Garcia Iturri');
            $this->mail->addAddress($paraQuien);
            $this->mail->Subject = $asunto;
            $this->mail->Body = $cuerpoMensaje;
            $this->mail->send();
            return true;
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error de correo: ' . $this->mail->ErrorInfo;
            return false;
        }
    }

}
?>