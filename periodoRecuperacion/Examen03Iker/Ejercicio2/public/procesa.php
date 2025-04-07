<?php
/* aqui vamos a tratar la imagen*/

$valoresValidos=[
    "image/jpeg"=>"jpeg",
    "image/jpg"=>"jpg"
];
$imagen=$_FILES['imagen'];


if(!isset($imagen)){
    header("Location: index.php?error=1");
    exit;
}

if(!array_key_exists($imagen['type'],$valoresValidos)){
   header("Location: index.php?error=2");
   exit;
}


if(move_uploaded_file($imagen['tmp_name'],'./Imagenes/'.basename($imagen["name"]))){
    header("Location: index.php?success=1&&ruta='".$imagen['tmp_name']."'");
    exit;
}else{
    header("Location: index.php?error=3");
    exit;
}

?>