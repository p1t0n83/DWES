<?php
require_once "../vendor/autoload.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <h1>Listado de productos</h1><br>
    <form action="formulario.php"><button>Crear productos</button></form> 
    <?php  if(isset($_GET['usuario']) && !empty($_GET['usuario'])){
    echo '<form action="logoff.php"><button>Desconectar usuario'.$_SESSION['usuario'].'</button></form><br>';}?>
</header>
<?php
  use App\clases\PDOProductos;
  use App\clases\Produ;
  if($_SERVER['REQUEST_METHOD']=='POST'){
  $produ=new Produ(new PDOProductos());
  if($produ->borrarProducto($_POST['id'])){
    echo "El producto ha sido eliminado correctamente";
  }else{
    echo "El producto no se pudo borrar";
  }
}
?>
</body>
</html>