<?php 
header("Content-Type: application/csv");    
header("Content-Disposition: attachment; filename=Usuario_exportado_" . date('Y:m:d:m:s').".csv");
?>
<?php
$output=fopen("php://output", "w");
fputcsv($output, array('idUsuario','Nombre', 'Email','Clave','telefono','estatus'));
include("Config.php");
$SELECT = "SELECT * FROM usuario WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
while ($fila = mysqli_fetch_assoc($datos))
{
  fputcsv($output,$fila);  
}
fclose($output);
?>