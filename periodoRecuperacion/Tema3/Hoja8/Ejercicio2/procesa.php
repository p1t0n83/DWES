<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=$_POST['nombre'];
    if($_POST['modulo']=='DWES'){
        header('Location: index.php?modulo=DWES && nombre='.$nombre);
    }else{
        header('Location: index.php?modulo=DWEC && nombre='.$nombre);
    }
}


?>