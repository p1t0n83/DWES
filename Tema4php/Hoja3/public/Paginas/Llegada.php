<?php
require '../../vendor/autoload.php';
use App\Clases\FuncionBD;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llegada</title>
</head>

<body>
    <h1>Llegada</h1>
    <hr>
   <?php
        FuncionBD::Llegada();
    ?>
    <a href="../index.html">Pagina de inicio</a>
</body>

</html>