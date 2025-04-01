<?php

/**
 * Guardo los datos
 */
$fichero = $_FILES['imagen'];
$nombreNuevo = $_POST['nombre'];

$tipos_permitidos = [
    "image/jpeg" => "jpeg",
    "image/jpg" => "jpg",
    "image/png" => "png",
    "application/pdf" => "pdf"
];
/**
 * Si ocurre algún error durante la subida del fichero, saltará un error=2
 * 0 significa que no ha habido ningún error
 */
if ($fichero["error"] !== 0) {

    /**
     * Recojo el código del error
     */
    $codigoError = $fichero["error"];

    /**
     * Dependiendo del codigo de error que aparezca, mostraré un mensaje
     */
    $mensajeError = match ($codigoError) {
        1 => 'El archivo cargado excede la directiva upload_max_filesize en php.ini',
        2 => 'El archivo cargado excede la directiva MAX_FILE_SIZE que se especificó en el formulario HTML',
        3 => 'El archivo cargado solo se cargó parcialmente',
        4 => 'No se cargó ningún archivo',
        6 => 'Falta una carpeta temporal',
        7 => 'No se pudo escribir el archivo en el disco.',
        8 => 'Una extensión PHP detuvo la carga del archivo.',
        default => 'Codigo inesperado'
    };

    header("Location:index.php?error=1&mensaje=" . $mensajeError);
    exit();
}


/** valido el tipo de file**/
if (!array_key_exists($fichero['type'], $tipos_permitidos)) {
    header("Location:index.php?error=2");
    exit;
}

/**cambimos el nombre del archivo si existe */
if(!empty($nombreNuevo)){
    $fichero['name']=$nombreNuevo . "." . $tipos_permitidos[$fichero["type"]];
}

 /**
     * Guardo en una variable el directorio donde moveré la imagen
     */
    $directorioDestino = './imagenes/';

     /**
     * Compruebo si existe el directorio imagenes
     * Si no existe, mostrará el mensaje de error 3
     */
    if(!file_exists($directorioDestino)){
        header("Location:index.php?error=3");
        exit();
    }
 /**Creo la ruta donde se moverá la imagen */
 $ubicacionFinal = $directorioDestino . basename($fichero["name"]);

/* guardamos el archivo en la nueva ruta*/ 
 if(!move_uploaded_file($fichero["tmp_name"], $ubicacionFinal)){
      header('Location:index.php?error=4');
      exit;
 }else{
    header("Location:index.php?success=1");
    exit;
 }

?>