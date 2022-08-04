<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<title>Inicio</title>
</head>
<body>
<nav class="navbar" style="background-color:green;">
  <div class="container-fluid">
    <a href="./homePageAdmin.php" class="navbar-brand" style="color:#ffffff">Carreras</a>
    <a href="../registerCarrer.html">
      <button class="btn btn-outline-light" type="submit">Registrar carrera</button>
</a>
<form class="d-flex" role="search" method="GET" action="./homePageAdmin.php">
        <input name="carrera" class="form-control me-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-warning" type="submit" name="buscar">Search</button>
      </form>
  </div>
</nav>
<?php require_once "../db/conexion.php"; ?>


<div class="row">
<?php
if(isset($_GET['buscar'])==1)
{
$nombre = $_GET['carrera'];
  $consulta= "SELECT * FROM carreras where nombreCarrera LIKE '%$nombre%';";
$ejecutarconsulta= mysqli_query($db,$consulta);
$verfilas= mysqli_num_rows($ejecutarconsulta);
$fila= mysqli_fetch_array($ejecutarconsulta);
// echo $verfilas;
if(!$ejecutarconsulta)
{
    echo("ERROR en la consulta");
}
else
    {
        if($verfilas<1)
        {
            echo('<h3><font color="black">Sin Registros</font></h3>');
        }
        else
        {
            for($x=0; $x<=$fila; $x++)
            {   
                echo'  

                
  <div class="col-sm-4">
    <div class="card" style="width: 25rem; margin-top:30px !important;">
      <img src="../img/carreras/'.$fila[3].'" class="card-img-top" alt="...">
        <h5 class="card-title">'.$fila[1].'</h5>
        <p class="card-text">'.$fila[2].'</p>
        <div class="contenedor" style="left: 100px;
        right: 100px;
        display: flex;
        justify-content: space-between;">
        <a href="./docentesPage.php?name='.$fila[2].'">
        <button type="submit" class="btn btn-warning">Docentes</button>
        </a>
        <a href="./deletDocentesPage.php?name='.$fila[2].'">
        <button type="submit" class="btn btn-danger" onclick="return ConfirmDelete()">Eliminar Carrera
        </button>
        </a>
        <script>
        function ConfirmDelete()
        {
            var $respuesta = confirm("Seguro de que deseas eliminar este producto");
        
            if ($respuesta == true)
            {
                return true;
            }
            else 
            {
                return false;
            }
        
        }
        </script>
        </div>       
      </div>
    </div>
 
            ';
            $fila=mysqli_fetch_array($ejecutarconsulta);
        }
     }
 }
}
else
{

    

$consulta= "SELECT * FROM carreras";
$ejecutarconsulta= mysqli_query($db,$consulta);
$verfilas= mysqli_num_rows($ejecutarconsulta);
$fila= mysqli_fetch_array($ejecutarconsulta);
// echo $verfilas;
if(!$ejecutarconsulta)
{
    echo("ERROR en la consulta");
}
else
    {
        if($verfilas<1)
        {
            echo('<h3><font color="black">Sin Registros</font></h3>');
        }
        else
        {
            for($x=0; $x<=$fila; $x++)
            {   
                echo'  

                
  <div class="col-sm-4">
    <div class="card" style="width: 25rem; margin-top:30px !important;">
      <img src="../img/carreras/'.$fila[3].'" class="card-img-top" alt="...">
        <h5 class="card-title">'.$fila[1].'</h5>
        <p class="card-text">'.$fila[2].'</p>
        <div class="contenedor" style="left: 100px;
        right: 100px;
        display: flex;
        justify-content: space-between;">
        <a href="./docentesPage.php?name='.$fila[2].'">
        <button type="submit" class="btn btn-warning">Docentes</button>
        </a>
        <a href="./deletDocentesPage.php?name='.$fila[2].'">
        <button type="submit" class="btn btn-danger" onclick="return ConfirmDelete()">Eliminar Carrera
        </button>
        </a>
        <script>
        function ConfirmDelete()
        {
            var $respuesta = confirm("Seguro de que deseas eliminar este producto");
        
            if ($respuesta == true)
            {
                return true;
            }
            else 
            {
                return false;
            }
        
        }
        </script>
        
        </div>       
      </div>
    </div>
 
            ';
            $fila=mysqli_fetch_array($ejecutarconsulta);
        }
     }
 }
}
    ?>
    </div>
</body>
</html>