<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $verbos=array("vivir","llorar","comprender","despistar");
    function conjugar($verbos): void{
        //con count sacamos la longitud del array
    $posicion=random_int(0,count($verbos)-1);
    $verbo=$verbos[$posicion];
    //conjugamos los verbos al presente del indicativo
    $verbo=str_replace("ar","o",$verbo);
    $verbo=str_replace("er","o",$verbo);
    $verbo=str_replace("ir","o",$verbo);
    echo "el presente del indicativo del verbo $verbos[$posicion] es $verbo";
    }
    conjugar($verbos);
    ?>
</body>
</html>