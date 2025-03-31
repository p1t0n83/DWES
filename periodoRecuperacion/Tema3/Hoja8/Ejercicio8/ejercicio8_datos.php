<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $num1=$_POST['numero1'];
        $num2=$_POST['numero2'];
        $operacion=$_POST['opcion'];
        switch($operacion){
            case "suma":{
                echo "Suma de: ".$num1."+".$num2."=".($num1+$num2);break;
            }case "resta":{
                echo "Resta de: ".$num1."-".$num2."=".($num1-$num2);break;
            }case "multi":{
                echo "Multiplicacion de: ".$num1."*".$num2."=".($num1*$num2);break;
            }case "divi":{
                echo "Division de: ".$num1."/".$num2."=".($num1/$num2);break;
            }
        }
    }
    ?>
</body>
</html>