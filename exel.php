<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=AutoUsado_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

?>
<?php
include("Config.php");

$SELECT = "SELECT idAutoUsado, precioTransaccion, marca, modelo, matricula, cliente.nombre, fechaCesion FROM autousado INNER JOIN cliente ON autousado.idCliente = cliente.idCliente WHERE autousado.estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Precio Transaccion</th>
<th align="center" class="table-primary">Marca</th>
<th align="center" class="table-primary">Modelo</th>
<th align="center" class="table-primary">Matricula</th>
<th align="center" class="table-primary">Cliente</th>
<th align="center" class="table-primary">Fecha Sesión</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["precioTransaccion"].'</td>
<td >'. $fila ["marca"].'</td>
<td>'. $fila ["modelo"].'</td>
<td>'. $fila ["matricula"].'</td>
<td>'. $fila ["nombre"].'</td>
<td>'. $fila ["fechaCesion"].'</td>';
}
?>
</table>
