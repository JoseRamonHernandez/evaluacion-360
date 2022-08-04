<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Registro de Docentes</title>
</head>
<body style="background-color: #ffffff">
<?php
$nombreCarrera = $_GET['carrera'];


?>


<nav class="navbar" style="background-color:green;">
  <div class="container-fluid">

    <a class="navbar-brand" style="color:#ffffff"><?php echo ("$nombreCarrera"); ?></a>
<a href="./docentesPage.php?name=<?php echo $nombreCarrera; ?>">
      <button class="btn btn-outline-light" type="submit">Regresar</button>
</a>
  </div>
</nav>

<br>
<br>
<center>
    <h1>Registro de Docentes para la Carrera</h1>
<form class="form" method="GET" action="./registerDocent.php" style="background-color: #ff9500; width: 800px; border-radius: 50px; ">
<br>
  <div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">Nombre:</label>
    <div class="col-sm-5">
      <input type="text" name="nombreDocente" class="form-control" id="inputEmail3" placeholder="Nombre(s) del Docente" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">Apellido:</label>
    <div class="col-sm-5">
      <input type="text" name="apellidoDocente" class="form-control" id="inputPassword3" placeholder="Apellido(s) del Docente" required>
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputText3" class="col-sm-5 col-form-label">Carrera:</label>
    <div class="col-sm-5">
      <input type="text" name="carrera" class="form-control" id="inputPassword3" value="<?php echo $nombreCarrera;?>" readonly="readonly">
    </div>
  </div>

  
  <button type="submit" class="btn btn-secondary" name="enviar">Registrar</button>
  <br>
  <br>
</form>
</center>

<?php require_once "../db/conexion.php"; ?>
<?php
    if(isset($_GET['enviar'])==1){
$nombreD = $_GET['nombreDocente'];
$apellidoD = $_GET['apellidoDocente'];
$carrera = $_GET['carrera'];


$almacenar= "INSERT INTO docentes( nombre, apellido, carreraAbrev) VALUES 
( '$nombreD', '$apellidoD', '$carrera')";
$resultado= mysqli_query($db, $almacenar);

if($resultado)
{
  
  ?>
 <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Registro Exitoso</h4>
  <p></p>
  <br>
  <a href="./docentesPage.php?name=<?php echo $carrera; ?>" class="mb-0" style="color: green"><- Regresar</a>
</div>
  
  
  <?php
}
else{
  ?>
 <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Fallo en el registro, consulte la base de datos</h4>
  <p></p>
  <br>
  <a href="./docentesPage.php?name=<?php echo $carrera; ?>" class="mb-0" style="color: green"><- Regresar</a>
</div>
  <?php
}
    }
?>       


</body>
</html>

