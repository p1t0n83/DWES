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
        $min=$_GET['min'];
        $max=$_GET['max'];
        if($min<$max){
            echo '<h2>LISTA DE PARES DE NUMEROS DE '.$min.' Y '.$max.'</h2>';
           for($i=0;$i<$max-1 ;$i++){
           echo "(".($i+2).",".($max-$i).") ";
           }
        }else{
            echo "El numero menor no puede ser mayor o igual que el maximo";
        }
    }

?>
<a href="index.html">Volver</a>
</body>
</html>