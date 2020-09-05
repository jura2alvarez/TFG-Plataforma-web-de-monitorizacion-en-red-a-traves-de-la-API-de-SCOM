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
      <title>Buscar por ID</title>
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

<div class="jumbotron text-center">
  <h1>Buscar servidor por ID</h1>

</div>


<div class="container">
  <div class="row">
    <div class="col-sm-3"> </div>

    <div class="col-sm-9">
      <h3 class="col-sm-6" ></h3>
      <form action="postPrueba.php" method="post">
        <label class="col-sm-6" for="usuario">ID SCOM:</label>
        <label class="sr-only" for="inlineFormInputGroupUsername">ID SCOM</label>
        <div class="input-group col-sm-6">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fas fa-search"></i></div>
          </div>
          <input type="text" class="form-control" name="id" placeholder="Introduce el ID de SCOM" pattern="........-....-....-....-............" title="El formato no coincide con una ID de SCOM"><br>
        </div>
        <br>
        <div class="input-group col-sm-6">
          <button type="submit" class="btn btn-primary" onclick="cargandoAnimacion()">Buscar</button>
        </div>
        <br>
      </form>
      
    </div>

    <div class="col-sm-5"> </div>
    <div class="col-sm-4" id="cargando"> </div>
  </div>
</div>

<script>
  function cargandoAnimacion(){
    document.getElementById("cargando").innerHTML = '<i class="fas fa-spinner fa-spin fa-3x"></i>' ;
  }
</script>


