<!DOCTYPE html>
<html>
<head>
    <title>Desarrollo Web</title>
</head>
<body>
    <?php 
        if (isset($_POST['enviar'])) { 
            $nombre = htmlspecialchars($_POST['nombre']); 
            $apellidos = htmlspecialchars($_POST['apellidos']);
            $edad = htmlspecialchars($_POST['edad']);
            
            // Imprime los datos
            echo "Nombre: " . $nombre . "<br />" .
                 "Apellidos: " . $apellidos . "<br />" .
                 "Edad: " . $edad . "<br />"; 
        } else {
            echo "No se ha enviado el formulario.";
        }
    ?>
</body>
</html>