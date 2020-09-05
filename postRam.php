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

$rutaRam='./PowerShellScripts/getRam.ps1' . ' '  . $usuario . ' '  . $pass . ' ' . $id;
$ramFecha=PowerShellCommand($rutaRam . '|Select-Object -ExpandProperty Fecha');
$ramValor= PowerShellCommand($rutaRam . '|Select-Object -ExpandProperty Valor'); 
?>

<!-- Inicio -->
<!-- Barra navegador -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Links -->
  <ul class="nav navbar-nav nav-info"> 
 		 <li style="float:right">
			<a class="navbar-brand .justify-content-rigth" href="#">
			<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png" style="width:60px;">
			</a>
		</li>  
		<li class="nav-item"><a class="nav-link" href="#">Home</a></li>
		<li class="nav-item" ><a class="nav-link" href="#">Page 2</a></li>
		<li class="nav-item"><a class="nav-link" href="formulariosPrueba.php">Buscar por ID</a></li>
		<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
			Servidores
		</a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="Sevilla1Disk.php">Sevilla1</a>
			<a class="dropdown-item" href="DBConnect.php">DBConnect</a>
			<a class="dropdown-item" href="#">Panel3 3</a>
		</div>
		</li> 
	</ul>
</nav>
<!-- Barra navegador -->
<!-- Cabeceras Bootstrap 4 -->
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Memoria RAM</title>
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
    </head>
<!-- Cabeceras Bootstrap 4 -->
<!-- FIN  -->

<br>
<div class="jumbotron text-center">
  <h1 class="display-3">Uso de la memoria RAM en %</h1>
  <p> <?= htmlspecialchars($id); ?> <p>

</div>
  
<center>
  <div class= "container">
    <div id="ramColumn" class="col-sm-4">
      <script src="https://code.highcharts.com/highcharts.js"></script>
      <script src="https://code.highcharts.com/modules/exporting.js"></script>
      <script src="https://code.highcharts.com/modules/export-data.js"></script>
      <script src="https://code.highcharts.com/modules/accessibility.js"></script>

      <figure class="highcharts-figure">
        <div id="column"></div>
        <p class="highcharts-description">
        </p>
      </figure>
      <script>
        Highcharts.chart('column', {
          chart: {
            type: 'column'
          },
          title: {
            text: 'Stacked column chart'
          },
          xAxis: {
            categories: [' ']
          },
          yAxis: {
            min: 0,
            title: {
              text: 'Ram total en %'
            }
          },
          tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
          },
          plotOptions: {
            column: {
              stacking: 'percent'
            }
          },
          series: [{
            name: 'Libre',
            data: [100 - <?= htmlspecialchars($ramValor); ?>],
            color:  <?php if($ramValor<10): ?>
                  <?php echo "'#FA5858'";?> //Color rojo fallo
                  <?php else:?>
                  <?php echo "'#81FA90'";?> //Color verde OK
                  <?php endif;?>
          }, {
            name: 'Usado',
            data: [<?= htmlspecialchars($ramValor); ?>]
          }]
        });

      </script>
    </div>
    Ultima fecha de monitorización : <?= htmlspecialchars($ramFecha); ?>
    <br>
    <br>
  </div>
  <form action="postPrueba.php" method="post">
    <button type="submit" class="btn btn-dark btn-lg">Volver</button>
    <input type="hidden" name="id" value=" <?=$id ?>" />
  </form>
</center>