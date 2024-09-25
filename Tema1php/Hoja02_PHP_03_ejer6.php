<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a=8;
    $b=3;
    $c=5;
    if($a == $b){
        echo "<p>a es igual a b</p>";
    }else{
        echo "<p>a no es igual a b</p>";
    }
    if($a != $b){
        echo " <p>a es distinto de b</p>";
    }else{
        echo "<p>a no es distinto de b</p>";
    }
    if($a < $b){
        echo " <p>a es menor que b</p>";
    }else{
        echo " <p>a no es menor que b</p>";
    }
    if($a > $b){
        echo " <p>a es mayor que b</p>";
    }else{
        echo " <p>a no es mayor que b</p>";
    }
    if($a >= $c){
        echo " <p>a  es mayor o igual que c</p>";
    }else{
        echo " <p>a no es mayor o igual que c</p>";
    }
    if($a <= $c){
        echo " <p>a  es menor o igual que c</p>";
    }else{
        echo " <p>a no es menor o igual que c</p>";
    }
    ?>
</body>
</html>