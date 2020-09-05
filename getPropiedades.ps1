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

$urlAut = "http://**************/OperationsManager/authenticate"
$auth=Invoke-RestMethod -Method POST -Uri $urlAut -Headers $scomheaders -body $jsonbody -Credential $scomCreds -SessionVariable websession    

#Propiedades de la maquina
$urlBase = "http://**********/OperationsManager/data/monitoringObjectProperties/"
$id=$args[2]
$url=$urlBase+$id
$datos = Invoke-WebRequest -Uri $url -Method Get -WebSession $websession -ContentType 'application/json'
$datosJson = ConvertFrom-Json -InputObject $datos

$listaNombres=""
$listaValores=""

foreach ($nombre in $datosJson.name ){
    $listaNombres+= $nombre + "///"
}

foreach ($valor in $datosJson.value ){
    if($valor -eq $null){
        $valor="-"
    }
    $listaValores+= $valor + "///"
}

$hash=@{"Nombre"= $listaNombres; "Valor"= $listaValores}
$tabla= New-Object PSObject -Property $hash
$tabla