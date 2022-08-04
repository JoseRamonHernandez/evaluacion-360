<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Edición de Docentes</title>
</head>
<body style="background-color: #ffffff">
<?php require_once "../db/conexion.php"; ?>
<?php
$id = $_GET['nombreDocente'];
$carreraDocente = $_GET['carreraDocente'];



$consulta= "SELECT * FROM docentes where id = $id;";
$ejecutarconsulta= mysqli_query($db,$consulta);
$verfilas= mysqli_num_rows($ejecutarconsulta);
$fila= mysqli_fetch_array($ejecutarconsulta);
?>


<nav class="navbar" style="background-color:green;">
  <div class="container-fluid">

    <a class="navbar-brand" style="color:#ffffff">Horarios</a>
<a href="./docentesPage.php?name=<?php echo $carreraDocente;?>">
      <button class="btn btn-outline-light" type="submit">Regresar</button>
</a>
  </div>
</nav>

<br>
<br>
<center>
    <h1>Formulario para Edición de Docentes para la Carrera</h1>
<form class="form" method="GET" action="./editDocente2.php" style="background-color: #ff9500; width: 800px; border-radius: 50px; ">
<br>
<div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">ID:</label>
    <div class="col-sm-5">
      <input type="text" name="idDocente" class="form-control" id="inputEmail3" value="<?php echo $fila[0];?>" readonly="readonly">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">Nombre:</label>
    <div class="col-sm-5">
      <input type="text" name="nombreDocente" class="form-control" id="inputEmail3" value="<?php echo $fila[1];?>" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">Apellido:</label>
    <div class="col-sm-5">
      <input type="text" name="apellidoDocente" class="form-control" id="inputPassword3" value="<?php echo $fila[2];?>" required>
    </div>
  </div>
  <button type="submit" class="btn btn-secondary" name="enviar">Actualizar</button>
  <br>
  <br>
</form>
</center>



</body>
</html>



