<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


</head>

<body>
  <form action="" method="get">
    <h1> Gestion de Contactos</h1>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required> <br>
    <label for="correo">Correo Electronico:</label>
    <input type="text" name="correo" id="correo" required><br>
    <label for="telefono">Telefono:</label>
    <input type="text" name="telefono" id="telefono" required><br>
    <button type="submit" value="Enviar">Agregar Contacto</button>
  </form>

  <?php
  $contactos = array(
    "Contacto1" => array(
      "Nombre" => "Juan Pérez",
      "Email" => "juan.perez@gmail.com",
      "Telefono" => "652678987"
    )
    ,
    "Contacto2" => array(
      "Nombre" => "María Lopez",
      "Email" => "maria.lopez@gmail.com",
      "Telefono" => "656714560"
    )
  );

  //verificamos que se ha enviado el formulario
  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['nombre']) && !empty($_GET['correo']) && !empty($_GET['telefono'])) {
      $nombre = $_GET['nombre'];
      $correo = $_GET['correo'];
      $telefono = $_GET['telefono'];
      // Agregamos el nuevo contacto al array
      $contactos[] = array(
        "Nombre" => $nombre,
        "Email" => $correo,
        "Telefono" => $telefono
      );
    }
    // la tabla
    echo "<table border='1'";
    echo "<tr><th>Nombre</th><th>Email</th><th>Telefono</th></tr>";
    foreach ($contactos as $contacto) {
      echo "<tr>";
      echo "<td>" . htmlspecialchars($contacto["Nombre"]) . "</td>";
      echo "<td>" . htmlspecialchars($contacto["Email"]) . "</td>";
      echo "<td>" . htmlspecialchars($contacto["Telefono"]) . "</td>";
      echo "</tr>";
    }
    echo "</table>";

  }

  ?>
</body>

</html>