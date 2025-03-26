<?php
namespace App\Clases;


use App\Interfaces\InterfazProveedorCorreo;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ProveedorMailtrap implements InterfazProveedorCorreo
{

    function __construct() {}
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {
        // Crea una nueva instancia de PHPMailer, con true decimos que queremos generar excepciones si ocurren
        $mail = new PHPMailer(true);


        // Configuración del servidor
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                // Habilita la salida de depuración detallada
        $mail->isSMTP();                                      // Establece el tipo de correo electrónico para usar SMTP
        $mail->Host = 'sandbox.smtp.mailtrap.io';                     // Especifica los servidores SMTP principales y de respaldo
        $mail->SMTPAuth = true;                               // Habilita la autenticación SMTP
        $mail->Username = '24b48eb7c08f2e';                   // Nombre de usuario SMTP
        $mail->Password = 'e14dac8e7acdd8';                   // Contraseña SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;   // Habilita el cifrado TLS; `ssl` también aceptado
        $mail->Port = 2525;

        try {
            // Configura y envía el mensaje
            $mail->setFrom('rompeolas93@gmail.com', 'Iker Garcia Iturri');
            $mail->addAddress('recipient@example.com', 'Recipient Name');
            $mail->Subject = 'Prueba de MailTrap';
            $mail->Body = 'Querido MailTrap, espero que funciones sin ningun problema';
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado.';
            echo 'Error de correo: ' . $mail->ErrorInfo;
            return false;
        }
    }
}
