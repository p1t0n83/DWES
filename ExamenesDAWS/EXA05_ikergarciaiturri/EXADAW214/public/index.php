<?php
require_once '../vendor/autoload.php';
require_once '../src/Ficheros/funciones.php';
use Examen05\Clases\Acciones;
//pagina index, la principal, solo tiene el inicializar para iniciar la sesion y el runaction para las redirecciones
Acciones::inicializar();

Acciones::runAction();
?>