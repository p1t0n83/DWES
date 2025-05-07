<?php
require_once "../vendor/autoload.php";
use App\clases\Imagen;
use App\clases\Producto;
use App\clases\Funciones;
use App\clases\Produ;
use App\Clases\PDOProductos;
if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!isset($_POST['titulo']) || !isset($_POST['precio']) || !isset($_POST['familia']) || !isset($_POST['descripcion']) || !isset($_FILES['imagen'])){
        redireccionar("formulario.php?error=1");
        exit;
    }

    if(!validarSubidaFichero($_FILES['imagen'])){
        redireccionar("formulario.php?error=2");
        exit;
    }

    $extension=pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION);
    if(validarFormatoImagen($extension)){
        redireccionar("formulario.php?error=3");
        exit;
    }

    if(! validarNumerico($_POST['precio'])){
        redireccionar("formulario.php?error=4");
        exit;
    }

    $nombreImagen=uniqid()."_".$_FILES['imagen']['name'];
    $direccionImagen='img/'.$nombreImagen;
    $imagen=new Imagen($nombreImagen,$direccionImagen);
    
    $funciones=new Funciones();
    $imagenId=$funciones->crearImagen($imagen);
    if($imagenId==0){
        redireccionar("formulario.php?error=5");
        exit;
    }else{
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],$direccionImagen)){
    $producto=new Producto($_POST['titulo'],$_POST['precio'],$_POST['familia'],$imagenId,$_POST['descripcion']);
    $produ=new Produ(new PDOProductos());
    if($produ->crearProducto($producto)){
        redireccionar("formulario.php?success=1");
        exit;
    }   else{
        redireccionar("formulario.php?error=5");
        exit;
    }    
    }else{
        redireccionar("formulario.php?error=5");
        exit;
    }
    } 
}  

?>