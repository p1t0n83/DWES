<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $numero;
     $primo=true;
     for($f=3;$f<=999;$f++){
        $primo=true;
        $numero=$f;
     if($numero<=1){
       $primo=false;
     }else{
     for($i=2;$i<=sqrt($numero) && $primo;$i++){
         if($numero % $i ==0){
        $primo=false;
         }
     }
 }
     echo $primo== false ? "":"$numero Es primo <br/>";
}
    ?>
</body>
</html>