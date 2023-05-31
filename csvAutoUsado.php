<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=AutoUsado_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('idAutoUsado','Precio Transaccion', 'Marca','Modelo','Matricula','Cliente', 'Fecha Sesion'));
include("Config.php");

$SELECT = "SELECT idAutoUsado, precioTransaccion, marca, modelo, matricula, cliente.nombre, fechaCesion FROM autousado INNER JOIN cliente ON autousado.idCliente = cliente.idCliente WHERE autousado.estatus = 1";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>