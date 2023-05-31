<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Vehiculo_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM vehículo WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Precio</th>
<th align="center" class="table-primary">Marca</th>
<th align="center" class="table-primary">Modelo</th>
<th align="center" class="table-primary">Matricula</th>
<th align="center" class="table-primary">Cilindros</th>';



while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["precioTransaccion"].'</td>
        <td >'. $fila ["marca"].'</td>
        <td>'. $fila ["modelo"].'</td>
        <td>'. $fila ["matricula"].'</td>
        <td>'. $fila ["cilindros"].'</td>';
}
?>
</table>