<?php
session_start();
function PowerShellCommand($rutaScript)
{
    $rutaSaneada = sprintf('powershell.exe -NonInteractive -NoProfile -ExecutionPolicy Bypass -Command "%s"', $rutaScript);

    return shell_exec($rutaSaneada);
}

$id =$_SESSION['id'];
$usuario =$_SESSION['usuario'];
$pass = $_SESSION['pass'];
$sesion=$_SESSION['sesion'];

$rutaDiscoDuro='./PowerShellScripts/getEspacioDisco.ps1' . ' '  . $usuario . ' '  . $pass . ' ' . $id;
$discoDuroFecha=PowerShellCommand($rutaDiscoDuro . '|Select-Object -ExpandProperty Fecha');
$discoDuroValor= PowerShellCommand($rutaDiscoDuro . '|Select-Object -ExpandProperty Valor'); 
?>

<!-- Inicio -->
<!-- Barra navegador -->
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
      <title>Espacio en disco</title>
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
<!-- FIN  -->

<div class="jumbotron text-center">
  <h1 class="display-3">Espacio en disco en %</h1>
  <p> <?= htmlspecialchars($id); ?> <p>

</div>




<div class= "container">
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

  <figure class="highcharts-figure">
    <div id="pie"></div>
    <p class="highcharts-description">
      
    </p>
  </figure>
  <script>
    Highcharts.chart('pie', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Espacio de disco en  <?= htmlspecialchars($id); ?>' 
      },
      tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      accessibility: {
        point: {
          valueSuffix: '%'
        }
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
          }
        }
      },
      series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
          name: 'Usado',
          y: 100 - <?= htmlspecialchars($discoDuroValor); ?>,
          sliced: true,
          selected: true
        }, {
          name: 'Libre',
          y: <?= htmlspecialchars($discoDuroValor); ?>,
        color:  <?php if($discoDuroValor<10): ?>
                <?php echo "'#FA5858'";?> //Color rojo fallo
                <?php else:?>
                <?php echo "'#81FA90'";?> //Color verde OK
                <?php endif;?>
        }]
      }]
    });
    </script>
  
  <center>
  Ultima fecha de monitorización : <?= htmlspecialchars($discoDuroFecha); ?>
  <br>
  <br>
    <form action="postPrueba.php" method="post">
      <button type="submit" class="btn btn-dark btn-lg">Volver</button>
      <input type="hidden" name="id" value="<?= $id ?>" />
    </form>
  </center>
</div>