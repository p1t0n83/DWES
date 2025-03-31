<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
      <h1>Suma de cantidades</h1>
      <hr>
      <?php
      for($i=0;$i<10;$i++){
         echo "<label for='cantidad'>Cantidad ".($i+1).": <input type='number' step=1 name='cantidad[]'></label><br>";
      }
      ?>
      <button>Sumar</button>
      </form>
      <?php
      if($_SERVER['REQUEST_METHOD']=='GET'){
      $suma=0;
       $array=$_GET['cantidad'];
       for($i=0;$i<count($array);$i++){
              $suma+=$array[$i];
       }
           echo "La suma de todo es:".$suma;
      }
      ?>
</body>
</html>