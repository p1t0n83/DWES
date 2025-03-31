<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>COMPROBARCION DE SI ES PAR O IMPAR</h1>
    <?php
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $numero=$_GET['numero'];
        if($numero%2==0){
            echo "El numero ".$numero." es par";
        }else{
            echo "El numero ".$numero." es impar";
        }
    }
    ?>
    <br>
    <a href="index.html" >Volver</a>
</body>
</html>