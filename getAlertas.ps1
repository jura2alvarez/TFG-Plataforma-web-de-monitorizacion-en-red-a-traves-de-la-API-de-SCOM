#Cabeceras para la autentificación con Usuario a la API de SCOM
$scomHeaders = New-Object 'System.Collections.Generic.Dictionary[[String],[String]]'
$scomHeaders.Add('Content-Type', 'application/json; charset=utf-8')
$scomCreds = Get-Credential
$bodyraw = 'Windows'
$Bytes = [System.Text.Encoding]::UTF8.GetBytes($bodyraw)
$EncodedText = [Convert]::ToBase64String($Bytes)
$jsonbody = $EncodedText | ConvertTo-Json

$urlAut = "http://*****/OperationsManager/authenticate"
$auth=Invoke-RestMethod -Method POST -Uri $urlAut -Headers $scomheaders -body $jsonbody -Credential $scomCreds -SessionVariable websession 

$query = @(
    @{ 'classId'= ''
      'displayColumns' ='severity','monitoringobjectdisplayname','name','age','repeatcount','lastModified'
})

$jsonquery = $query | ConvertTo-Json

$url='http://*******/OperationsManager/data/alert'

$Response = Invoke-RestMethod -Uri $url -Method Post -Body $jsonquery -ContentType “application/json” -UseDefaultCredentials -WebSession $websession

$alerts = $Response.Rows
$alerts