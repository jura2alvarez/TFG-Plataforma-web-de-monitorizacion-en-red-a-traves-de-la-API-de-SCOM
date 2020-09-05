<?php 
session_start();
$usuario= $_SESSION['usuario'];
$sesion= $_SESSION['sesion'];
?>
<!-- Inicio -->
<!-- Barra navegador -->
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
    <title>Panel de Monitorización</title>
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
</html>
<!-- Cabeceras Bootstrap 4 -->
<!-- Libreria de estilo del formulario  -->
<!-- FIN  -->

<div class="jumbotron text-center">
    <h1>Panel de Monitorización </h1>
    <i class="fas fa-heartbeat" style="font-size:120px; color:#FA5858"> </i>
</div>


<div class="container">
    <div class="row .table-responsive">
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title"><a href="Servidores.php" class="btn btn-link"><i class="fas fa-server fa-border" style="font-size:120px;color:#2196F3"></i></a></h5>
                </div>
                <div class="card-footer text-muted" style="">
                    Servidores
                </div>
            </div>
        </div>
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="formulariosPrueba.php" class="btn btn-link"><i class="fas fa-search fa-border" style="font-size:120px;color:#2196F3"></i></a></h5>
                </div>
                <div class="card-footer text-muted">
                    Buscar
                </div>
            </div>
        </div>
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="#" class="btn btn-link"><i class="fas fa-exclamation-triangle fa-border" style="font-size:120px;color:#2196F3"></i></a></h5>
                </div>
                <div class="card-footer text-muted">
                    Alertas
                </div>
            </div>
        </div>        
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title"><a href="DBConnect.php" class="btn btn-link"><i class="fas fa-database fa-border" style="font-size:120px;color:#2196F3"></i></a></h5>
                </div>
                <div class="card-footer text-muted" style="">
                    Estado BD
                </div>
            </div>
        </div>
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="#" class="btn btn-link"><i class="fas fa-times-circle fa-border" style="font-size:120px;color:#FA5858"></i></a></h5>
                </div>
                <div class="card-footer text-muted">
                    Pendiente
                </div>
            </div>
        </div>
        <!-- Principio carta -->
        <div class="col-sm-4">
            <div class="card text-center" style="width:18rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="#" class="btn btn-link"><i class="fas fa-times-circle fa-border" style="font-size:120px;color:#FA5858"></i></a></h5>
                </div>
                <div class="card-footer text-muted">
                    Pendiente
                </div>
            </div>
        </div>        
    </div>
</div>
<br>

