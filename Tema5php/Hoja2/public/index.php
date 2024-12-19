<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fecha= date("Y-m-d H:i:s");
    setcookie("sesion", $fecha, time() + 86400, "/", "", true, true);
    
     if(isset($_COOKIE ['sesion'])){
        echo $_COOKIE['sesion'];
    }else{
        echo "Bienvenido manin";
    }
   
    ?>
</body>
</html>