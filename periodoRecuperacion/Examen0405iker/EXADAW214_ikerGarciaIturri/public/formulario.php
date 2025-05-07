<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario alta</title>
</head>
<body>
    <header>
    <h1>Listado de productos</h1><br>
    <form action="index.php"><button>Index</button></form> 
    <?php
     require_once "../vendor/autoload.php";
     session_start();
    ?>
    <?php
    echo '<form action="logoff.php"><button>Desconectar usuario'.$_SESSION['usuario'].'</button></form><br>';?>
    <?php
   
    if($_SERVER['REQUEST_METHOD']=='GET'){
        if(isset($_GET['success'])){
            echo "A funcionado, el producto se guardo con exito";
        }else if(isset($_GET['error'])){
            switch($_GET['error']){
                case 1:{
                    echo "Por favor, rellena todos los campos";
                    break;
                }
                case 2:{
                    echo "No se puede procesar el archivo";
                    break;
                }
                case 3:{
                    echo "El archivo no tiene una extension válida";
                    break;
                }
                case 4:{
                    echo "Por favor, introduce un precio válido";
                    break;
                }
                case 5:{
                    echo "No se ha podido guardar el producto en la base de datos";
                }
            }
        }
    }
    ?>
    </header>
    <form method="POST" action="procesa.php" enctype="multipart/form-data">
    <h1>Alta de producto</h1>
    <label for="titulo"><input type="text" placeholder="Titulo" name="titulo"></label><br>
    <label for="descripcion"><textarea placeholder="Descripción" name="descripcion"></textarea></label><br>
    <label for="precio"><input type="text" placeholder="Precio" name="precio"></label><br>
    <label for="familia">Selecciona una familia:
        <select name="familia">
            <?php
             use App\clases\Funciones;
             $funciones=new Funciones();
             $familias=$funciones->getFamilias();
             var_dump($familias);
             foreach($familias as $familia){
                echo "<option value='".$familia->__get("codigo")."'>".$familia->__get("nombre")."</option>";
             }
            ?>
        </select>
    </label><br>
    <label for="imagen"><input type="file" placeholder="No se ha selecionado ningún archivo" name="imagen"></label><br>
    <button>Enviar</button>
    </form>
    
</body>
</html>