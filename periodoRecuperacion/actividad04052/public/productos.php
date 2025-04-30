<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .acciones a {
            margin-right: 10px;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .ver {
            background-color: #007bff;
        }

        .borrar {
            background-color: #dc3545;
        }

        .crear {
            background-color: #28a745;
        }

        .auth-links {
            margin-bottom: 20px;
        }

        .auth-links a {
            margin-right: 15px;
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .login {
            background-color: #007bff;
        }

        .registro {
            background-color: #28a745;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .cesta {
            background-color: #ffc107;
            color: black;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cesta:hover {
            background-color: #e0a800;
        }

        .botones {
            margin-top: 20px;
        }

        .botones button {
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .vaciar {
            background-color: #dc3545;
            color: white;
        }

        .comprar {
            background-color: #28a745;
            color: white;
        }

        .desconectar {
            background-color: #007bff;
            color: white;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    if($_SERVER['REQUEST_METHOD']==='GET'){
      if(isset($_GET['usuario'])){
        $usuario=$_GET['usuario'];
        $_SESSION['usuario']=$usuario;}
    }
    ?>

    <div class="auth-links">
        <?php if (isset($_SESSION['usuario'])): ?>
            <?php  if(isset($_SESSION['cesta'])){echo (count($_SESSION['cesta'])."productos (".$_SESSION['cesta']->precio.")€");}?>
            <span>Bienvenido, <?php echo $_SESSION['usuario']; ?></span>
            <form method="POST" action="logoff.php" style="display: inline;">
        <button type="submit" class="desconectar" style="background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Desconectar</button>
    </form>
        <?php else: ?>
            <a href="login.php" class="login">Login</a>
            <a href="registro.php" class="registro">Registro</a>
        <?php endif; ?>
    </div>

    <h1>Listado de Productos</h1>
    <a href="formularioAlta.php" class="crear">Crear Nuevo Producto</a>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Familia</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once "../vendor/autoload.php";
            use Ejercicio0405\clases\PDOProducto;
            use Ejercicio0405\clases\Produ;

            // Crear instancia de Produ
            $repositorio = new Produ(new PDOProducto());
            $productos = $repositorio->listarProductos();

            if (!empty($productos)) {
                foreach ($productos as $producto) {
                    echo "<tr>";
                    echo "<td>{$producto->idproductos}</td>";
                    echo "<td>{$producto->nombre}</td>";
                    echo "<td>{$producto->descripcion}</td>";
                    echo "<td>{$producto->precio} €</td>";
                    echo "<td>{$producto->familia}</td>";
                    echo "<td><img src='img/{$producto->imagen}' alt='Imagen de {$producto->nombre}'></td>";
                    echo "<td class='acciones'>";
                    echo "<form method='POST' style='display:inline;'>";
                    echo "<input name='id' type='hidden' value='{$producto->idproductos}'>";
                    echo "<button type='submit' class='cesta'>Meter en la cesta</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay productos disponibles.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="botones">
        <button class="vaciar" id="vaciar" disabled>Vaciar cesta</button>
        <button class="comprar" id="comprar" disabled>Comprar</button>
    </div>

    <?php
    // Manejar la acción de "Meter en la cesta"
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']) && is_numeric($_POST['id'])) {
       if(empty($_SESSION['usuario'])){
        redireccionar("Location: login.php");
        exit;
       }else{
        $id=$_POST['id'];
        $funciones=new Produ(new PDOProducto());
        $producto=$funciones->listarProductoId($id);
        $_SESSION['cesta'][]=$producto;
       }
       
    }
    ?>
</body>

</html>