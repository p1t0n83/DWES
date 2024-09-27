<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero=1;
    $primo=true;

    if($numero<=1){
      $primo=false;
    }else{
    for($i=2;$i<=sqrt($numero) && $primo;$i++){
        if($numero % $i ==0){
       $primo=false;
        }
    }
}
    echo $primo== false ? "$numero No es primo":"$numero Es primo"; 
    ?>
</body>
</html>