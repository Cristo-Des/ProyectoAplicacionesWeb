<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Reporte3_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('NumeroOpcion','nombre','descripcion','matriculaCoche','mes'));
include("Config.php");
$SELECT = "SELECT * FROM opcionmes";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>