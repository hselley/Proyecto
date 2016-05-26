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
      <li><a href="db.php">Registro</a></li>
      <li class="active"><a href="#">Consulta</a></li>
    </ul>
    <h1>Consulta</h1>
    <table class="table table-responsive table-hover">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Edad</th>
        </tr>
      </thead>
        <?php
          // Create connection
          $conn = mysqli_connect(localhost, geeker, selley, prueba);

          // Check connection
          if (!$conn) {
             die("Connection failed: " . mysqli_connect_error());
          }

          $sql = "select * from persona;";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
             // output data of each row
             while($row = mysqli_fetch_assoc($result)) {
               echo "<tr><td>" . $row["nombre"] . "</td><td>" . $row["apellido"] . "</td><td>" . $row["edad"] . "</td></tr>";
             }
          } else {
              echo "<div class=\"alert alert-success fade in\">
                      <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                      <strong>¡No hay registros!</strong>
                    </div>";
          }

          mysqli_close($conn);
        ?>
      </tbody>
    </table>
  </body>
</html>
