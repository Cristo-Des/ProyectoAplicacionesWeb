<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Opcion_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM opcion WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Numero Opcion</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Descripcion</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["nuOpcion"].'</td>
        <td >'. $fila ["nombre"].'</td>
        <td>'. $fila ["descripcion"].'</td>';
        }
?>
</table>