<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Opcion_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('idOpcion','Numero Opcion', 'Nombre','descripcion','estatus'));
include("Config.php");
$SELECT = "SELECT * FROM opcion WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>