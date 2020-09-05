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

$urlAut = "http://*******/OperationsManager/authenticate"
$auth=Invoke-RestMethod -Method POST -Uri $urlAut -Headers $scomheaders -body $jsonbody -Credential $scomCreds -SessionVariable websession;
$auth
