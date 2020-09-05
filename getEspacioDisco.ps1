#Cabeceras para la autentificación con Usuario a la API de SCOM
$usuario=$args[0]
$password= ConvertTo-SecureString -String $args[1] -AsPlainText -Force
$scomHeaders = New-Object 'System.Collections.Generic.Dictionary[[String],[String]]'
$scomHeaders.Add('Content-Type', 'application/json; charset=utf-8')
$scomCreds = New-Object -TypeName System.Management.Automation.PSCredential -ArgumentList $usuario, $password

$bodyraw = 'Windows'
$Bytes = [System.Text.Encoding]::UTF8.GetBytes($bodyraw)
$EncodedText = [Convert]::ToBase64String($Bytes)
$jsonbody = $EncodedText | ConvertTo-Json

$urlAut = "http://***********/OperationsManager/authenticate"
$auth=Invoke-RestMethod -Method POST -Uri $urlAut -Headers $scomheaders -body $jsonbody -Credential $scomCreds -SessionVariable websession;


$id=$args[2];
 
    $QueryDiskPerCent = @"
  {
    "duration": "60",
    "id": "$id",
    "performanceCounters":
    [
    {
      "objectname":  "LogicalDisk",
      "countername":  "% Free Space",
      "instancename":  "C:"
  }
    ]
  
  }
"@
$ResponseDiskPerCent = Invoke-WebRequest http://******/OperationsManager/data/performance -Method Post -Body $QueryDiskPerCent -WebSession $websession -ContentType 'application/json'
$datosDiskPercent = ConvertFrom-Json -InputObject $ResponseDiskPerCent


foreach ($dato in $datosDiskPercent.datasets.data) {
  $a = $dato -split ";"
  foreach ($b in $a) {
    $b = $b -replace "@{", "" -replace "}", "" -replace " ", ""
    $fecha = $b.Substring(0, 28) -replace ".0000000Z", "" -replace "T", "  "
    $fecha
    $valor = $b.Substring(29)
    $valor
  }
}

$hash=@{"Fecha"= $fecha; "Valor"= $valor}
$tabla= New-Object PSObject -Property $hash
$tabla
