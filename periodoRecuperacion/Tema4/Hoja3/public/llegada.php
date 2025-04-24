<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Llegada</h1>
    <?php
    require_once "../vendor/autoload.php";
    use App\FuncionesBD;
    $funciones=new FuncionesBD();
    $funciones->llegada();
    ?>
</body>
</html>