<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Registro</title>
</head>
<body>
<?php require_once "../db/conexion.php"; ?>
<?php
    if(isset($_GET['enviar'])==1){
$nombreC = $_GET['nombre'];
$abreviacionC = $_GET['abreviacion'];
$imagenC = $_GET['imagen'];


$almacenar= "INSERT INTO carreras( nombreCarrera, abreviacion, imagen) VALUES 
( '$nombreC', '$abreviacionC', '$imagenC')";
$resultado= mysqli_query($db, $almacenar);

if($resultado)
{
  
  ?>
 <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Registro Exitoso</h4>
  <p></p>
  <hr>
  <a href="./homePageAdmin.php" class="mb-0" style="color: green"><- Regresar</a>
</div>
  
  
  <?php
}
else{
  ?>
 <div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">Fallo en el registro, consulte la base de datos</h4>
  <p></p>
  <hr>
  <a href="./homePageAdmin.php" class="mb-0" style="color: green"><- Regresar</a>
</div>
  <?php
}
    }
?>       

    
</body>
</html>