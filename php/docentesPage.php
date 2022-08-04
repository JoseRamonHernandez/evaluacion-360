<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <title>Docentes</title>
</head>
<body>
<nav class="navbar" style="background-color:green;">
  <div class="container-fluid">
  <?php
$nombre = $_GET['name'];
?>
    <a class="navbar-brand" style="color:#ffffff"><?php echo ("Docentes - $nombre"); ?></a>
    <a href="./registerDocent.php?carrera=<?php echo $nombre;?>">
      <button class="btn btn-outline-warning" type="submit">Registrar Docente</button>
</a>
<a href="./homePageAdmin.php">
      <button class="btn btn-outline-light" type="submit">Regresar</button>
</a>
  </div>
</nav>
<br>
<table class="table table-dark table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Materias</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
<?php require_once "../db/conexion.php"; ?>


<?php

$consulta= "SELECT * FROM docentes WHERE carreraAbrev = '$nombre'";
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

                
                <tr>
                <td>'.$fila[1].'</td>
                <td>'.$fila[2].'</td>
                <td>
                <a href="./materiasDocente.php?nombreDocente='.$fila[0].'">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                <line x1="3" y1="6" x2="3" y2="19"></line>
                <line x1="12" y1="6" x2="12" y2="19"></line>
                <line x1="21" y1="6" x2="21" y2="19"></line>
                </svg>
                </a>
                </td>
                <td>
                <a href="./editDocente.php?nombreDocente='.$fila[0].'">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                <path d="M16 5l3 3"></path>
                </svg>
                </a>
                </td>
                <td>
                <a href="./deletDocente.php?nombreDocente='.$fila[0].'">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" onclick="return ConfirmDelete()">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <line x1="4" y1="7" x2="20" y2="7"></line>
                <line x1="10" y1="11" x2="10" y2="17"></line>
                <line x1="14" y1="11" x2="14" y2="17"></line>
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                </svg>
                </a>
                <script>
                        function ConfirmDelete()
                        {
                            var $respuesta = confirm("Seguro de que desea eliminar a este Docente");
                        
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
                </td>
                </tr>
                
            ';
            $fila=mysqli_fetch_array($ejecutarconsulta);
        }
     }
 }

    ?>
     </tbody>
</table>
</body>
</html>
