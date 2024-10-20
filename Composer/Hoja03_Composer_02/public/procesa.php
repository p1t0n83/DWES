<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\ServicioCorreo;
use App\Clases\ProveedorMailtrap;

// Validar los campos
if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['mensaje'])) {
    header('Location: formulario.php?error=1');
    exit;
}
// Crear la instancia del servicio de correo
$proveedorMailtrap = new ProveedorMailtrap();
$servicioCorreo = new ServicioCorreo($proveedorMailtrap);

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Enviar el correo
$asunto='nuevo mensaje de '.$nombre;
if ($servicioCorreo->enviarCorreo($email, $asunto, $mensaje)) {
    header('Location:formulario.php?success=1');
    exit;
} else {
    header('Location: formulario.php?error=3');
    exit;
}
?>