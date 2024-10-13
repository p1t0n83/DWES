<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            $edad= $_POST['edad'];
            print "Nombre ".$nombre. "<br/>". 
            "Edad". $edad . "<br/>";
        }

        // con metodo GET
        /*
        if(isset($_GET['enviar'])){
            $nombre = $_GET['nombre'];      
            $edad = $_GET['edad'];

            print_r($_GET); 
        }
            */
    ?>
</body>
</html>