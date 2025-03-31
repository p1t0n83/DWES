<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    $nombre=$_REQUEST['nombre'];
    
    if($_REQUEST['modulo']=='DWES'){
        header('Location: index.php?modulo=DWES && nombre='.$nombre);
    }else{
        header('Location: index.php?modulo=DWEC && nombre='.$nombre);
    }
}


?>