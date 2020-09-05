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
      <title>Sevilla1</title>
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


<?php  //Conexiones a la BD
$serverName = "DESKTOP-OGS23HA\SQLEXPRESS02"; //serverName\instanceName, portNumber (1433 by default)
$connectionInfo = array( "Database"=>"Prueba");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    $conexionExito = "Successfuly connected";
}else{
     echo "Connection error.<br />";
     die( print_r( sqlsrv_errors(), true));
}
//Conexion con Espacio en Disco
$queryDisk = "SELECT TOP (1) * FROM [dbo].[Sevilla1DiskPC] ORDER BY ID DESC";
  
$fechaDisk=sqlsrv_query($conn,$queryDisk);
$percentFree=sqlsrv_query($conn,$queryDisk);
$percentUsed=sqlsrv_query($conn,$queryDisk);

//Fin de conexion con Espacio en Disco
//
//Conexion con Data Perfomance (Processor data) <---- Le tengo que cambiar el nombre
$queryDataP = "SELECT * FROM (SELECT TOP (10) [DataPerfomanceId]
      ,[Fecha]
      ,[Hora]
      ,[Valor]
  FROM [Prueba].[dbo].[Sevilla1DataPerfomance] ORDER BY DataPerfomanceId DESC) result ORDER BY DataPerfomanceId ";
$timeProcessor=sqlsrv_query($conn,$queryDataP);
$fechaProcessor=sqlsrv_query($conn,$queryDataP);
$horaProcessor=sqlsrv_query($conn,$queryDataP);
//Fin conexion con Data Perfomance (Processor data)
//
//Conexion con Memoria (RAM)
$queryRam = "SELECT TOP (1) * FROM [dbo].[Sevilla1RAM] ORDER BY IDRAM DESC";
$datoRamFree=sqlsrv_query($conn,$queryRam);
$datoRamUsed=sqlsrv_query($conn,$queryRam);
$fechaRam=sqlsrv_query($conn,$queryRam);

//Fin de conexion con Memoria (RAM)

?>

<!-- Alertas con ventanas -->

	<?php $percentFreeAlerta=sqlsrv_query($conn,$queryDisk);?>
	<?php while ($row = sqlsrv_fetch_array($percentFreeAlerta)):?>
		<?php $alertaRam= $row['FreeDiskPC']; ?>
		<?php if ($alertaRam<10):?>
			<script language="javascript">
			alert("El espacio libre en disco es menor del 10%")
			</script>
		<?php endif;?>
	<?php endwhile;?>

	<!-- Alertas RAM -->
	<?php $datoRamUsedAlerta=sqlsrv_query($conn,$queryRam);?>
	<?php while ($row = sqlsrv_fetch_array($datoRamUsedAlerta)):?>
		<?php $alertaRam= $row['Valor']; ?>
		<?php if ($alertaRam<10):?>
			<script language="javascript">
			alert("La memoria RAM libre es menor del 10%")
			</script>
		<?php endif;?>
	<?php endwhile;?>

<div class="jumbotron text-center">
  <h1>Sevilla1</h1>
  <p>Panel de datos</p>
</div>

<div class="container"> 
	<div class="row">
		<div class="col-sm-3"> <!-- Espacio libre de disco en % -->
        <h3></h3>  <!-- Espacio libre de disco en % -->
		<div id="piechartPerCent">
			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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
				 // Build the chart
				Highcharts.chart('pie', {
					chart: {
						plotBackgroundColor: null,
						plotBorderWidth: null,
						plotShadow: false,
						type: 'pie'
					},
					title: {
						text: 'Espacio en disco en %'
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
								enabled: false
							},
							showInLegend: true
						}
					},
					series: [{
						name: '% de espacio en disco',
						colorByPoint: true,
						data: [{
							name: 'Usado',
							y: 100 - <?php while ($row = sqlsrv_fetch_array($percentUsed)):?>
			<?php $var= $row['FreeDiskPC']; ?>
			<?= htmlspecialchars($var); ?>
			<?php endwhile; ?>,
							sliced: true,
							selected: true
						}, {
							name: 'Libre',
							y: <?php while ($row = sqlsrv_fetch_array($percentFree)):?>
			<?php $var= $row['FreeDiskPC']; ?>
			<?= htmlspecialchars($var); ?>
			<?php endwhile; ?>,
							color: <?php if($var<10): ?>
						<?php echo "'#FA5858'";?> //Color rojo fallo
						<?php else:?>
						<?php echo "'#81FA90'";?> //Color verde OK
						<?php endif;?>
							
						
						}]
					}]
				});
			</script>
			<?php while ($row = sqlsrv_fetch_array($fechaDisk)):?>
			Última fecha de dato: <?= htmlspecialchars($row['Hora']); ?>
			<?php endwhile; ?>
		</div>
        
  </div>

		<div class="col-sm-0"> <!-- Columna vacia -->
	</div>

	<div class="col-sm-3"> <!-- Memoria RAM -->
        <h3></h3>  
		<div id="ramColumn">
			<script src="https://code.highcharts.com/highcharts.js"></script>
			<script src="https://code.highcharts.com/modules/exporting.js"></script>
			<script src="https://code.highcharts.com/modules/export-data.js"></script>
			<script src="https://code.highcharts.com/modules/accessibility.js"></script>

			<figure class="highcharts-figure">
			  <div id="ramColumn"></div>
			  <p class="highcharts-description">
			  </p>
			</figure>
			<script>
				Highcharts.chart('ramColumn', {
				chart: {
				type: 'column'
				},
				title: {
				text: 'Memoria RAM en %'
				},
				xAxis: {
				categories: ['']
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
				data: [100 - <?php while ($row = sqlsrv_fetch_array($datoRamUsed)):?>
			<?php $var= $row['Valor']; ?>
			<?= htmlspecialchars($var); ?>
			<?php endwhile; ?>],
				color: 
						<?php if((100 - $var)<10): ?>
						<?php echo "'#FA5858'";?> //Color rojo fallo
						<?php else:?>
						<?php echo "'#81FA90'";?> //Color verde OK
						<?php endif;?>
				}, {
				name: 'Usado',
				data: [<?php while ($row = sqlsrv_fetch_array($datoRamFree)):?>
			<?php $var= $row['Valor']; ?>
			<?= htmlspecialchars($var); ?>
			<?php endwhile; ?> ]
				}]
				});	
			</script>
			<?php while ($row = sqlsrv_fetch_array($fechaRam)):?>
			Última fecha de dato: <?= htmlspecialchars($row['Hora']); ?>
			<?php endwhile; ?>
		</div>
  	</div>
 
		<div class="col-sm-6"> <!-- Proccessor Time -->
		<h3></h3>    <!-- Proccessor Time -->
		<div id="charDataPerfomance">
			<script src="https://code.highcharts.com/highcharts.js"></script>
			<script src="https://code.highcharts.com/modules/series-label.js"></script>
			<script src="https://code.highcharts.com/modules/exporting.js"></script>
			<script src="https://code.highcharts.com/modules/export-data.js"></script>
			<script src="https://code.highcharts.com/modules/accessibility.js"></script>

			<figure class="highcharts-figure">
			<div id="linechart"></div>
			</figure>
			<script>
				Highcharts.chart('linechart', {
				chart: {
				type: 'area'
				 },
				title: {
				text: 'Processor Time'
				 },
				subtitle: {
				text: ''
				 },
				 xAxis: {
				categories: [
				<?php while ($row = sqlsrv_fetch_array($timeProcessor)):?>
				<?php $DataPerfomanceValor= "'". $row['Hora'] . " - " . $row['Fecha'] . "'," ; ?>
				<?= htmlspecialchars($DataPerfomanceValor); ?>
				<?php endwhile; ?>]
				 },
				 yAxis: {
				title: {
				  text: 'CPU'
				}
				 },
				 plotOptions: {
				area: {
				  dataLabels: {
					enabled: false
				  },
				  enableMouseTracking: true,
				  marker: {
					  enabled: false
					  }
				  
				}
				 },
				 series: [{
				name: 'Processor Time',
				data: [
				<?php while ($row = sqlsrv_fetch_array($horaProcessor)):?>
				<?php $DataPerfomanceValor= $row['Valor']  .  "," ; ?>
				<?= htmlspecialchars($DataPerfomanceValor); ?>
				<?php endwhile; ?> ]
				 }]
				});
			</script>

			

	</div>
    </div>
	</div>
</div>
<br>


