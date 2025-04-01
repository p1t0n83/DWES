<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Albumnes</h1>
    <form enctype="multipart/form-data" method="post" action="procesa.php">
        Nombre del album:<br>
        <label for="nombre"><input type="text" name="nombre" placeholder="titulo del album" required></label><br>
        Imagen:<br>
        <label for="imagen"><input type="file" name="imagen" required> </label><br>
        <br>
        <button>Enviar album</button>
    </form>

    <?php
    $mensaje = '';

    /**
     * Miro si el get me devuelve un error
     */
    if (isset($_GET["error"])) {
        $error = intval($_GET["error"]);

        /**
         * Guardo un mensaje personalizado para cada tipo de error
         */
        $mensaje = match ($error) {
            1 => isset($_GET["mensaje"]) ? "<p class='error'>".$_GET["mensaje"]."</p>" : '<p class="error">Ha ocurrido un error en la imagen</p>',
            2 => '<p class="error">La extensión del fichero no es válida, debe ser jpg, png o pdf</p>',
            3 => '<p class="error">El directorio imagenes no existe</p>',
            4=>'<p class=""error>No se ha podido mover el fichero</p>',
            default => '<p class="error">Error inesperado</p>'
        };
    }

    /**
     * Compruebo si el get me devuelve un success 
     */
    if (isset($_GET["success"])) {

        /**
         * Escanea el directorio que pase por parámetro y me devuelve un array con su contenido
         */
        $imagenes=scandir("imagenes/");

        foreach($imagenes as $imagen){

            /**
             * Elimino que no me muestre el . y .. ya que me lo devuelve el scandir
             */
            if($imagen !== '.'  && $imagen!=='..'){

                /**
                 * Obtengo la información del fichero
                 */
                $infoFichero=pathinfo($imagen);

                /**
                 * Obtengo su extensión
                 */
                $extension=$infoFichero["extension"];

                /**
                 * Obtengo el nombre del fichero
                 */
                $nombreFichero=$infoFichero["filename"];
        
                /**
                 * Si el fichero tiene extension pdf, me mostrará un link para pinchar sobre el y  se abrirá una nueva pestaña con el fichero pdf
                 * Si es una imagen, se mostrará un titulo con el nombre de la imagen y la foto correspondiente
                 */
                if($extension === "pdf" ){
                    echo "<p><a href='imagenes/" . $infoFichero['basename'] . "' target='_blank'>Ver PDF". $infoFichero["filename"]. "</a></p>";
                }else{
                    echo "<h1>". $nombreFichero. "</h1>";
                    echo "<img src='imagenes/" . $infoFichero['basename'] . "' alt='$infoFichero[filename]'>";
                }
            }
        }
    }

    /**
     * Si hay un mensaje, se muestra
     */
    if ($mensaje) {
        echo $mensaje;
    }
?>

</body>

</html>