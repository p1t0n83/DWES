<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <h1>Validador de IBAN</h1>
        <label for="iban">Codigo IBAN: <input type="text" name="iban" id="iban"></label>
        <button type="submit" >Enviar</button>
    </form>

    <?php
     require_once "../vendor/autoload.php";
     use App\clases\metodos;
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $codigo=$_POST['iban'];
        $comprobador=new Metodos($codigo);
        echo $comprobador->validarLongitudCaracteres()? "El IBAN esta bien formado <br>":"";
       $comprobador->digitosControl();
     }
    ?>
</body>

</html>