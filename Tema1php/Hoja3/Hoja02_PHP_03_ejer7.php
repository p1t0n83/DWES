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
    if(($a == $b) && ($c > $b)){
        echo"<p>a es igual a b y c es mayor que b</p>";
    }else{
        echo"<p>a no es igual que b o  c no es mayor que b, o ambas</p>";
    }
    if(($a == $b) || ($b == $c)){
        echo"<p>a es igual a b o b es igual a c</p>";
    }else{
        echo "<p>ni a es igual a b ni b es igual a c</p>";
    }
    if(($b <= $c)){
    echo "<p>b es menor o igual que c</p>";
    }else{
    echo "<p>b no es menor o igual que c</p>";
    }
    ?>
</body>
</html>