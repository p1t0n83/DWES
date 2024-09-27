<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero =10;
    for($i=$numero;$i>=1;$i--){
     for ($f=$i; $f >= 1; $f--) { 
        echo"$f ";
    }
    echo"<br>";
    }
    /*
    no hagas esto en tu vida
      $numero =10;
    for($i=$numero;$i>=1;$i--){
     if($i === 1){
        echo "$i <br>";
        $i = $numero--;
     } else {
        echo $i . " ";
     }
    }
    ?>
</body>
</html>