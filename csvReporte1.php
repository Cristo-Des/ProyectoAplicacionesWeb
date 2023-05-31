<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Reporte1_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('MatriculaCoche','Fecha Venta','Nombre Vendedor','ApellidoP','ApellidoM','Precio','marca','modelo'));
include("Config.php");
$SELECT = "SELECT * FROM ventasaño";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>