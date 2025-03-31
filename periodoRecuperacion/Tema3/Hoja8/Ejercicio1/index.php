<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="">
        <label for="nombre">Nombre:<input name="nombre" id="nombre"></label>
        <label for="edad">Edad:<input name="edad" id="edad"></label>
        <button>Enviar</button>
    </form>
    <?php
     if($_SERVER['REQUEST_METHOD']=='GET'){
        $nombre=$_GET['nombre'];
        $edad=$_GET['edad'];
        echo  'Nombre: '.$nombre.'. Edad: '.$edad; 
     }
    ?>
</body>
</html>