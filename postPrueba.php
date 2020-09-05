<?php  
session_start();
function PowerShellCommand($rutaScript)
{
    $rutaSaneada = sprintf('powershell.exe -NonInteractive -NoProfile -ExecutionPolicy Bypass -Command "%s"', $rutaScript);

    return shell_exec($rutaSaneada);
}

$_SESSION['id']=$_POST["id"];
$id=$_SESSION['id'];

$usuario= $_SESSION['usuario'];
$pass= $_SESSION['pass'];
$ruta = './PowerShellScripts/getPropiedades.ps1' . ' '  . $usuario . ' '  . $pass . ' ' . $id;

$datosName= PowerShellCommand($ruta . '|Select-Object -ExpandProperty Nombre');
$datosValue= PowerShellCommand($ruta . '|Select-Object -ExpandProperty Valor');
$Nombres=explode('///', $datosName);
$Valores=explode('///', $datosValue);
$_SESSION['id'] = $id;
$sesion= $_SESSION['sesion'];
?>
<!-- Barra navegador -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <!-- Links -->
  <ul class="nav navbar-nav mr-auto">
			<a class="navbar-brand" href="#">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png" style="width:60px;">
			</a>
		<li class="nav-item"><a class="nav-link" href="paginaPrincipal.php"><i class="fas fa-heartbeat" style="color:#FA5858"></i> Panel</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"><i class="fas fa-server"></i> Servidores</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="Sevilla1Disk.php">Sevilla1</a>
                <a class="dropdown-item" href="Sevilla1Disk.php">Sevilla2</a>
                <a class="dropdown-item" href="Sevilla1Disk.php">Sevilla3</a>
                <a class="dropdown-item" href="Sevilla1Disk.php">Sevilla4</a>
            </div>
        </li> 
		<li class="nav-item"><a class="nav-link" href="formulariosPrueba.php"><i class="fas fa-search"></i> Buscar</a></li>        
		<li class="nav-item" ><a class="nav-link" href="Alertas.php"><i class="fas fa-exclamation-triangle"></i> Alertas</a></li>
		<li class="nav-item" ><a class="nav-link" href="DBConnect.php"><i class="fas fa-database "></i> BD</a></li>
		
  </ul>
  <ul class="navbar-nav" style="color: #e3f2fd;">
    <li class="nav-item"><?= htmlspecialchars($sesion);?></li>  
  </ul>
</nav>
<br>
<br>
<br>
<!-- Barra navegador -->
<!-- Inicio -->

<!-- Cabeceras Bootstrap 4 -->
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Info</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/ac4759fb14.js"> </script>

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

      <script src="https://kit.fontawesome.com/ac4759fb14.js"> </script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      

    </head>
<!-- Cabeceras Bootstrap 4 -->
<!-- Libreria de estilo del formulario  -->
<!-- FIN  -->

<div class="jumbotron text-center">
  <h1>Informacion del servidor</h1>
  <p> <?= htmlspecialchars($id);?></p> 
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-1">
      <!-- Espacio Disco -->
        <form action="postEspacioDisco.php" method="post">
          <button type="submit" class="btn btn-dark btn-lg align-bottom" style="margin-rigth:10px" onclick="cargandoAnimacion()"> <i class="fas fa-hdd md-18" style="font-size: 50px ;"></i>\C:</button>
        </form>
      </div>
      <!-- FIN Espacio Disco-->
      <!-- RAM -->
      <div class="col-sm-1">
        <form action="postRam.php" method="post">
          <button type="submit" class="btn btn-dark btn-lg align-bottom" style="margin-rigth:15px; margin-left:10px" onclick="cargandoAnimacion()"><i class="fas fa-memory md-18" style="font-size: 50px ;"></i>RAM</button>
        </form>
      </div>
      <!-- FIN RAM -->
      <!-- CPU -->
      <div class="col-sm-1">
        <form action="postCPU.php" method="post">
          <button type="submit" class="btn btn-dark btn-lg align-bottom" style="margin-left:25px" onclick="cargandoAnimacion()"> <i class="material-icons md-18" style="font-size: 50px">memory</i>CPU</button>
        </form>
      </div>
      <div class="col-sm-9">
      </div>
      <div class="col-sm-5">
      </div>
      <div class="col-sm-4" id="cargando">
      </div>
      <!-- CPU -->
  </div>
  <br>
  <h2><?= htmlspecialchars($id);?></h2>            
  <table class="table table-hover">
	<thead class="">
	  <tr>
		<th>Nombre</th>
		<th>Valor</th>
	  </tr>
	</thead>
	<tbody>
	<?php 
	for ($i=0; $i< sizeof($Valores); $i++){
	  echo "<tr>";
			echo "<td>" . $Nombres[$i] . "</td>";
			echo "<td>" . $Valores[$i] . "</td>";
		echo "</tr>";
	}?>
	</tbody>
  </table> 
</div>

<script>
  function cargandoAnimacion(){
    document.getElementById("cargando").innerHTML = '<i class="fas fa-spinner fa-spin fa-3x"></i>' ;
  }
</script>