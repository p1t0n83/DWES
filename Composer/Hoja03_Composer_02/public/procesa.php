<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Clases\ServicioCorreo;
use App\Clases\ProveedorMailtrap;


$nombre = $_GET['nombre'] ?? '';
$email = $_GET['email'] ?? '';
$mensaje = $_GET['mensaje'] ?? '';
$asunto=$_GET['asunto']??'';

// Validar los campos
if (empty($nombre) || empty($email) || empty($mensaje)) {
    header('Location: formulario.php?error=1');
    exit;
}

// Validar el email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: formulario.php?error=2');
    exit;
}

// Crear la instancia del servicio de correo
$proveedorMailtrap = new ProveedorMailtrap();
$servicioCorreo = new ServicioCorreo($proveedorMailtrap);

// Enviar el correo

if ($servicioCorreo->enviarCorreo($email, $asunto, $mensaje)) {
    header('Location: formulario.php?success=1');
    exit;
} else {
    header('Location: formulario.php?error=3');
    exit;
}
?>