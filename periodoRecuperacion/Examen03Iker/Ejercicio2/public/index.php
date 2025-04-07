<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form enctype="multipart/form-data" method="POST" action="procesa.php" >
    <h1>Subir Imagen</h1>
    <label for="imagen"><input type="file" name="imagen"></label>      
    <br><button>Subir Imagen</button>
    </form>
    <?php
      require '../vendor/autoload.php';
      use Ejercicio2\Clases\CambiosImagen;
      if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['success'])){
        $ruta=$_GET['ruta'];
        $cambiosImagen=new CambiosImagen();
        echo "<h1>Imagen original</h1>";
        echo "<img src='".$ruta."'>";
        $cambiosImagen->redimensionarImagen(250,250,$ruta);
        echo "<h2>Muestra 250X250</h2>";
        echo "<img src='".$ruta."'>";
        }
        if(isset($_GET['error'])){
            $error=$_GET['error'];
            switch($error){
                case 1:
                    echo "O no se ha seleccionado ningun archivo o no se ha pasado bien"; break;
                case 2: 
                    echo "El tipo de archivo no es correcto, ha de ser jpg o jpeg";break;
                case 3: 
                    echo "Ha habido un error al subir la imagen"; break;
              
            }
        }
      }
      
    ?>
</body>
</html>