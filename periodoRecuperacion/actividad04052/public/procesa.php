<?php

require_once "../vendor/autoload.php";
require_once "../helper.php";

use Ejercicio0405\clases\PDOProducto;
use Ejercicio0405\clases\Produ;
use Ejercicio0405\clases\Producto;

// Verificar si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar que todos los campos requeridos estén presentes
    if (
        !validar_requerido($_POST['nombre']) ||
        !validar_requerido($_POST['descripcion']) ||
        !validar_requerido($_POST['precio']) ||
        !validar_requerido($_POST['familia']) ||
        !validar_subida_fichero($_FILES['imagen'])
    ) {
        header("Location: formularioAlta.php?error=1"); // Error 1: Faltan datos
        exit;
    }

    // Validar que el precio sea numérico
    if (!validar_numerico($_POST['precio']) || $_POST['precio'] <= 0) {
        header("Location: formularioAlta.php?error=4"); // Error 4: Precio no válido
        exit;
    }

    // Validar el formato de la imagen
    $ext = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
    if (!validar_formato_imagen($ext)) {
        header("Location: formularioAlta.php?error=3"); // Error 3: Formato de imagen no válido
        exit;
    }

    // Generar un nombre único para la imagen
    $nombreImagen = uniqid() . "_" . $_FILES['imagen']['name'];
    $rutaImagen = "img/" . $nombreImagen;

    // Mover la imagen al directorio "img"
    if (!move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {
        header("Location: formularioAlta.php?error=2"); // Error 2: No se puede procesar el archivo
        exit;
    }

    // Limpiar los datos del formulario
    $nombre = limpiar_entrada($_POST['nombre']);
    $descripcion = limpiar_entrada($_POST['descripcion']);
    $precio = limpiar_entrada($_POST['precio']);
    $familia = limpiar_entrada($_POST['familia']);

    // Crear el producto con el nombre único de la imagen
    $producto = new Producto($nombre, $precio, $familia, $descripcion, $nombreImagen);

    // Guardar el producto en la base de datos
    try {
        $repositorio = new Produ(new PDOProducto());
        if ($repositorio->crearProducto($producto, $nombreImagen)) {
            header("Location: index.php?success=1"); // Producto creado correctamente
            exit;
        } else {
            header("Location: formularioAlta.php?error=5"); // Error 5: No se pudo guardar en la base de datos
            exit;
        }
    } catch (Exception $e) {
        header("Location: formularioAlta.php?error=5"); // Error 5: No se pudo guardar en la base de datos
        exit;
    }
}
?>