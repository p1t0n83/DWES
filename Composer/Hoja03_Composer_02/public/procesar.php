<?php
// procesar.php
require 'vendor/autoload.php';
require 'app/src/clases/ServicioCorreo.php';
require 'app/src/clases/ProveedorMailtrap.php';

if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['mensaje'])) {
    header('Location: formulario.php?error=1');
    exit();
}

$correo = $_POST['correo'];
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: formulario.php?error=2');
    exit();
}

$servicioCorreo = new ServicioCorreo(new ProveedorMailtrap());
$resultado = $servicioCorreo->enviarCorreo($_POST['correo'], 'Asunto del correo', $_POST['mensaje']);

if ($resultado) {
    header('Location: formulario.php?success=1');
} else {
    header('Location: formulario.php?error=3');
}
exit();
?>