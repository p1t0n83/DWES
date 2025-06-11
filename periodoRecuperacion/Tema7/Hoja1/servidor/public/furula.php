<?php
// test_simple.php
require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../routes/api.php';

try {
    echo "=== PRUEBA DE CONEXIÓN Y CONSULTA ===\n";
    
    // Crear instancia
    $producto = new App\Entities\Producto();
    echo "✓ Producto creado\n";
    
    // Probar get()
    $productos = $producto->get();
    
    echo "Tipo de dato devuelto: " . gettype($productos) . "\n";
    echo "Es null: " . (is_null($productos) ? 'SÍ' : 'NO') . "\n";
    echo "Está vacío: " . (empty($productos) ? 'SÍ' : 'NO') . "\n";
    echo "Cantidad de elementos: " . (is_array($productos) ? count($productos) : 'N/A') . "\n";
    
    var_dump($productos);
    
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    echo "Archivo: " . $e->getFile() . " línea: " . $e->getLine() . "\n";
}