<?php
namespace Paginas;
require '../vendor/autoload.php';
use App\Clases\FuncionBD;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Llegada</h1>
    <hr>
    <form method="POST">
        <input type="submit" name="Llegada" id="Llegada" value="Llegada">
    </form>
    <a href="../public/index.html">Página de inicio</a>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        FuncionBD::Llegada();
    }
    ?>
</body>

</html>