<?php 
session_start();
$usuario= $_SESSION['usuario'];
$sesion= $_SESSION['sesion'];
?>
<!-- Inicio -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
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
<!-- Barra navegador -->
<!-- Cabeceras Bootstrap 4 -->
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Servidores</title>
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

      <script src="https://kit.fontawesome.com/ac4759fb14.js"></script>
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    </head>
<!-- Cabeceras Bootstrap 4 -->
<!-- Libreria de estilo del formulario  -->
<!-- FIN  -->

<div class="jumbotron text-center">
  <h1>Servidores de SCOM</h1>
</div>



<div class="container">
    <div class="list-group">
        <!-- Sevilla1 -->
        <a href="Sevilla1Disk.php" class="list-group-item list-group-item-action">
            <div class="media">
                <i class="fab fa-windows fa-border mr-3 mt-3" style="font-size:60px ; border-color: transparent; color:#2196F3"></i>
                <div class="media-body">
                    <h3>Sevilla1 <small><i class="ml-3 text-right">Windows Server 2016</i></small></h3>
                    <h4>Roles:</h4>
                    <ul>
                        <form>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="BD" name="BD" checked="checked" disabled>
                                <label class="custom-control-label" for="BD"><i class="fas fa-database"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Unix" name="Unix" checked="checked" disabled>
                                <label class="custom-control-label" for="Unix"><i class="fab fa-linux"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Red" name="Red"  checked="checked" disabled>
                                <label class="custom-control-label" for="Red"><i class="fas fa-network-wired"></i></label>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </a>

        <!-- Sevilla2 -->
        <a href="Sevilla1Disk.php" class="list-group-item list-group-item-action">
            <div class="media">
                <i class="fab fa-windows fa-border mr-3 mt-3" style="font-size:60px ; border-color: transparent; color:#2196F3"></i>
                <div class="media-body">
                    <h3>Sevilla2 <small><i class="ml-3 text-right">Windows Server 2016</i></small></h3>
                    <h4>Roles:</h4>
                    <ul>
                        <form>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="BD" name="BD" checked="checked" disabled>
                                <label class="custom-control-label" for="BD"><i class="fas fa-database"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Unix" name="Unix" disabled>
                                <label class="custom-control-label" for="Unix"><i class="fab fa-linux"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Red" name="Red" disabled>
                                <label class="custom-control-label" for="Red"><i class="fas fa-network-wired"></i></label>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </a>

        <!-- Sevilla3 -->
        <a href="Sevilla1Disk.php" class="list-group-item list-group-item-action">
            <div class="media">
                <i class="fab fa-windows fa-border mr-3 mt-3" style="font-size:60px ; border-color: transparent; color:#2196F3"></i>
                <div class="media-body">
                    <h3>Sevilla3 <small><i class="ml-3 text-right">Windows Server 2016</i></small></h3>
                    <h4>Roles:</h4>
                    <ul>
                        <form>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="BD" name="BD" disabled>
                                <label class="custom-control-label" for="BD"><i class="fas fa-database"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Unix" name="Unix"  checked="checked" disabled>
                                <label class="custom-control-label" for="Unix"><i class="fab fa-linux"></i></label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="Red" name="Red" disabled>
                                <label class="custom-control-label" for="Red"><i class="fas fa-network-wired"></i></label>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </a>
    </div>
</div>
<br>
<div class="container">
    <div class="float-right">
        <i class="fas fa-database"></i> Base de datos 
        <i class="fab fa-linux"></i> Linux/Unix 
        <i class="fas fa-network-wired"></i> Red 
    </div>
    
</div>


