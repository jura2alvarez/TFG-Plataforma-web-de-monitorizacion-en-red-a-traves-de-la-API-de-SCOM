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
      <title>Estado BD</title>
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
<?php
$nombreServidor = "DESKTOP-OGS23HA\SQLEXPRESS02"; //serverName\instanceName, portNumber (1433 by default)
$infoConexion = array( "Database"=>"Prueba");
$conexionBD = sqlsrv_connect( $nombreServidor, $infoConexion);
$query = "SELECT name, user_access_desc, state_desc FROM sys.databases Where name ='PanelMonitorizacion' or Name= 'Validacion' or Name='Prueba' ORDER BY name ";
?>


<div class="jumbotron text-center">
  <h1>Estados de las bases de datos</h1>
</div>

<!-- https://docs.microsoft.com/es-es/sql/relational-databases/system-catalog-views/sys-databases-transact-sql?view=sql-server-ver15 ----Documentacion    -->

<div class="container">
  <?php
      if($conexionBD) {
          echo '
          <div class="alert alert-success alert-dismissible" style="font-family:Lucida Console">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            Conectado correctamente al servidor.
          </div>';
          
          $resNombre=sqlsrv_query($conexionBD,$query);
      }else{
          echo '
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              Error de conexión al servidor.
            </div>';
          echo '<div class="alert alert-danger">';
          print_r( sqlsrv_errors());
          echo '</div>';
          die();
      }
    ?>
</div>

<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Nombre BD</th>
        <th class ="col-sm-2" scope="col">Estado</th>
        <th scope="col">Tipo acceso usuario</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php 
          while ($row = sqlsrv_fetch_array($resNombre)){
            echo '<tr>';
            echo '<td> <h4> <i class="fas fa-database"></i>  ' . $row['name'] . '<h4></td>';
            
            if ($row['state_desc'] == 'ONLINE'){
              echo '<td> <div class="alert alert-success text-center"> <i class="fas fa-check-circle"> </i> '. $row['state_desc'] . '</div></td>';
            }else{
              echo '<td> <div class="alert alert-danger text-center"> <i class="fas fa-exclamation-circle"> </i> '. $row['state_desc'] . '</div></td>';
            }

            echo '<td>' . $row['user_access_desc'] . '</td>';
            echo '</tr>';
          }
        ?>
      </tr>
    </body
  </table>
</div>
<br>
