<?php 

session_start(); 
$_SESSION['usuario'] = $_POST["usuario"];
$_SESSION['pass'] = $_POST["pass"];
$usuario= $_SESSION['usuario'];
$pass= $_SESSION['pass'];

function PowerShellCommand($rutaScript)
{
    $rutaSaneada = sprintf('powershell.exe -NonInteractive -NoProfile -ExecutionPolicy Bypass -Command "%s"', $rutaScript);

    return shell_exec($rutaSaneada);
}

$ruta = './PowerShellScripts/conexionSCOM.ps1' . ' '  . $usuario . ' '  . $pass;
$sesion= PowerShellCommand($ruta . '|Select-Object -ExpandProperty name');
$_SESSION['sesion'] = $sesion
?>

<!-- Inicio -->
<!-- Barra navegador -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
  <ul class="nav navbar-nav mr-auto">
			<a class="navbar-brand" href="#">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png" style="width:60px;">
			</a>
		<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
		<li class="nav-item" ><a class="nav-link" href="#">Page 2</a></li>
		<li class="nav-item"><a class="nav-link" href="formulariosPrueba.php">Buscar por ID</a></li>
		<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Servidores</a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="Sevilla1Disk.php">Sevilla1</a>
        <a class="dropdown-item" href="DBConnect.php">DBConnect</a>
        <a class="dropdown-item" href="#">Panel3 3</a>
      </div>
		</li> 
  </ul>
  <ul class="navbar-nav" style="color: #e3f2fd;">
    <li class="nav-item"><?= htmlspecialchars($sesion);?></li>  
  </ul>
</nav>
<br>
<!-- Barra navegador -->
<!-- Cabeceras Bootstrap 4 -->
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Login correcto</title>
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

    </head>
<!-- Cabeceras Bootstrap 4 -->
<!-- Libreria de estilo del formulario  -->
<!-- FIN  -->

<br>
<div class="jumbotron text-center">
  <h1 class="display-3">Login correcto</h1>
  <br>
  <p> Usuario actual: <?= htmlspecialchars($sesion); ?> </p>
  <a href="paginaPrincipal.php" type="button" class="btn btn-link btn-lg"><i class="fas fa-desktop" style="color:#2196F3"></i> Ir al panel</a>
</div>
