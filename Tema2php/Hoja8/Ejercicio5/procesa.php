<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recogiendo los datos con $_POST
    $numero = isset($_POST['numero']) ? intval($_POST['numero']) : null;

   
    if($numero%2==0){
        echo 'El numero '.$numero.' es par';
    }else{
        echo 'El numero '.$numero.' es impar';
    }
}
    ?>