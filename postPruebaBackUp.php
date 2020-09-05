<!-- Barra navegador -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png"  width="50px"></a>
    </div>
    <ul class="nav navbar-nav nav-info">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Servidores
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Sevilla1Disk.php">Sevilla1</a></li>
          <li><a href="DBConnect.php">DBConnect</a></li>
          <li><a href="#">Panel 3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="formulariosPrueba.php">Buscar por ID</a></li>
    </ul>
  </div>
</nav>
<!-- FIN Barra navegador -->

<?php  
function PowerShellCommand($rutaScript)
{
    $rutaSaneada = sprintf('powershell.exe -NonInteractive -NoProfile -ExecutionPolicy Bypass -Command "%s"', $rutaScript);

    return shell_exec($rutaSaneada);
}
$id=$_POST["id"];
$usuario= $_POST["usuario"];
$pass= $_POST["pass"];
$ruta = './PowerShellScripts/getPropiedades.ps1' . ' '  . $usuario . ' '  . $pass . ' ' . $id;
$rutaDiscoDuro='./PowerShellScripts/getEspacioDisco.ps1' . ' '  . $usuario . ' '  . $pass . ' ' . $id;

$datosName= PowerShellCommand($ruta . '|Select-Object -ExpandProperty Nombre');
$datosValue= PowerShellCommand($ruta . '|Select-Object -ExpandProperty Valor');
$Nombres=explode('///', $datosName);
$Valores=explode('///', $datosValue);

$discoDuroFecha=PowerShellCommand($rutaDiscoDuro . '|Select-Object -ExpandProperty Fecha');
$discoDuroValor= PowerShellCommand($rutaDiscoDuro . '|Select-Object -ExpandProperty Valor'); 
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Post Prueba</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      </head>
      <body>

<div class="jumbotron text-center">
  <h1>PHP escribe en PowerShell</h1>
  <p>Formulario que imprime la busqueda simple</p> 
</div>

</html>

<div class="container">
   
  <h2>Buscando "<?php echo $id ?>"</h2>            
  <table class="table table-hover">
	<thead class="thead-dark">
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
    text: 'Espacio de disco en  <?php echo ($id ); ?>' 
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
Ultima fecha de monitorización : <?= htmlspecialchars($discoDuroFecha); ?>


</div>