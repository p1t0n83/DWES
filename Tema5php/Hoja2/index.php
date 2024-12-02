<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
    if(isset($_COOKIE['last_session'])){
        echo "Ultima sesion ".$_COOKIE['last_session'];
    }else{
        echo "Bienvenido";
    }

    $ultima_sesion=date("Y-m-d H:i:s");
    setcookie("last_session", $ultima_sesion,  time()+86400, "/");
     ?>
</body>
</html>