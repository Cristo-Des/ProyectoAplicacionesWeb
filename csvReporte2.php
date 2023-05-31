<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Reporte2_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('Precio','Modelo','Marca','FechaSesion','Nombre','ApellidoP','ApellidoM'));
include("Config.php");
$SELECT = "SELECT * FROM sesionescliente2022";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>