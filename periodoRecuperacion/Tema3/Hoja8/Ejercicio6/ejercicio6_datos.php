<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     if($_SERVER['REQUEST_METHOD']=='GET'){
          $numero=$_GET['numero'];
          echo '<h2> TABLA DE MULTIPLICAR DEL '.$numero.'</h2>';
          for($i=1;$i<=10;$i++){
            echo $numero.'x',$i,'='.($numero*$i).'<br>';
          }
     }
    ?>
    <a href="index.html" >Volver</a>
</body>
</html>