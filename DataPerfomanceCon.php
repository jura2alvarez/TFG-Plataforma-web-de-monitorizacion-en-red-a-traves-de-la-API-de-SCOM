<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Fujitsu-Logo.svg/500px-Fujitsu-Logo.svg.png"  width="50px"></a>
    </div>
    <ul class="nav navbar-nav nav-info">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Panel
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Panel 1</a></li>
          <li><a href="DBConnect.php">Rule Info Prueba</a></li>
          <li><a href="#">Panel 3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<?php
$serverName = "DESKTOP-OGS23HA"; //serverName\instanceName, portNumber (1433 by default)
$connectionInfo = array( "Database"=>"scomuaa");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
    $conexionExito = "Successfuly connected";
}else{
     echo "Connection error.<br />";
     die( print_r( sqlsrv_errors(), true));
}
$query = "SELECT TOP (20) [DataPerfomanceId]
      ,[fecha]
      ,[hora]
      ,[valor]
  FROM [scomuaa].[dbo].[DataPerfomance]";
  
$res=sqlsrv_query($conn,$query);
$res2=sqlsrv_query($conn,$query);


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      </head>
      <body>

<div class="jumbotron text-center">
  <h1>Base de datos</h1>
  <p>Esta pagina significa que se ha conectado la BD correctamente!</p> 
  <p><?php echo $conexionExito; ?></p>
</div>
  
<div align="center">
<h3>Data Perfomance</h3>  
<br>


<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Fecha', 'Valor'],
		  <?php while ($row2 = sqlsrv_fetch_array($res2)):?>
<?php $Valores=   "['" . $DataPerfomanceValor= $row2['fecha'] ." " .	$DataPerfomanceValor= $row2['hora']	 . "',"  .  $DataPerfomanceValor= $row2['valor'] . "],"    ; ?>
<?php echo $Valores;?>
<?php endwhile; ?> 
		  ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.charts.Line(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
  </div>
  <p>
  <br>
  
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>

<div id="container">
<script>
Highcharts.chart('container', {

    title: {
        text: 'Data Perfomance'
    },

    subtitle: {
        text: 'Grupo Monitorización'
    },

    yAxis: {
        title: {
            text: 'Valor'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Data Perfomance',
        data: [<?php while ($row = sqlsrv_fetch_array($res)):?>
<?php $Valores2=   $DataPerfomanceValor= $row['valor']  .  "," ; ?>
<?php echo $Valores2;?>
<?php endwhile; ?> ]
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
</script>
</div>
</html>

