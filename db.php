<!DOCTYPE html>
<html>
  <head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Registro</title>
  </head>
  <body class="container">
    <h1>Sistema de Personas</h1>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#">Registro</a></li>
      <li><a href="db2.php">Consulta</a></li>
    </ul>
    <h1>Registro</h1>
    <form method="post" role="form">
      <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre">
      </div>
      <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" class="form-control" name="apellido" placeholder="Ingrese su apellido">
      </div>
      <div class="form-group">
        <label for="edad">Edad:</label>
        <input type="number" class="form-control" name="edad" min="0" max="120" placeholder="Seleccione su edad">
      </div>
      <button type="submit" class="btn btn-lg btn-primary">Registrar</button>
    </form>
    <?php
/*      if (strlen($_POST["nombre"]) > 0) {
        echo "<BR>Tu nombre es ";
        echo $_POST["nombre"];
      }
      if (strlen($_POST["apellido"]) > 0) {
        echo $_POST["apellido"];
      }
      if ($_POST["edad"] != 0 ) {
        echo "<br>Su edad es: ";
        echo $_POST["edad"];
      }
*/
      if (strlen($_POST["nombre"]) > 0 && strlen($_POST["apellido"]) > 0 && $_POST["edad"] != 0) {
        $con=mysqli_connect("localhost","geeker","selley","prueba");

        // Check connection
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // escape variables for security
        $firstname = mysqli_real_escape_string($con, $_POST['nombre']);
        $lastname = mysqli_real_escape_string($con, $_POST['apellido']);
        $age = mysqli_real_escape_string($con, $_POST['edad']);
        //    $age = $_POST['edad'];
        $sql="INSERT INTO persona (nombre, apellido, edad)
          VALUES ('$firstname', '$lastname', '$age');";

        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
        echo "<div class=\"alert alert-success fade in\">
                <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                <strong>¡Registro exitoso!</strong>
              </div>";

        mysqli_close($con);
      }
    ?>
  </body>
</html>
