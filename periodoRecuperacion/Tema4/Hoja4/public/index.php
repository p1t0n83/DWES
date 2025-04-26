<?php
require_once "../vendor/autoload.php";

use App\clasesbd\FuncionesBD;

try {
    $funcionesBD = new FuncionesBD();
    $productos = $funcionesBD->getProductos();

    echo "<h1>Lista de Productos</h1>";
    if (!empty($productos)) {
        echo "<ul>";
        foreach ($productos as $producto) {
            echo "<li>" . $producto . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No hay productos disponibles.</p>";
    }
} catch (Exception $e) {
    echo "<p>Error al cargar los productos: " . $e->getMessage() . "</p>";
}
?>