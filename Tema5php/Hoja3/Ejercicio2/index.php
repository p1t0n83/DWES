<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $contador=0;
    session_start();
    
    $_SESSION['visitas'][$contador] = date("Y-m-d H:i:s");
    if(count($_SESSION['visitas'])==0){
        echo"primer acceso";
        $contador++;
    }else{
        echo "Se ha accedido un total de: ". $_SESSION['visitas'][$contador];
        $contador++;
    }
    ?>
</body>
</html>