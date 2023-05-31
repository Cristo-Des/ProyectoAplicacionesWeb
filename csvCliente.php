<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Cliente_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('idCliente','Nombre', 'Rfc','ApellidoP','ApellidoM','Direccion', 'Telefono','Fecha Venta'));
include("Config.php");

$SELECT = "SELECT idCliente, nombre, rfc, apellidoPaterno, apellidoMaterno, direccion, telefono, venta.fechaVenta FROM cliente INNER JOIN venta ON cliente.idVenta = venta.idVenta WHERE cliente.estatus = 1";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>