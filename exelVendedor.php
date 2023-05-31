<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Vendedor_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM vendedor WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">RFC</th>
<th align="center" class="table-primary">Apellido P</th>
<th align="center" class="table-primary">Apellido M</th>
<th align="center" class="table-primary">Direccion</th>
<th align="center" class="table-primary">Telefono</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["nombre"].'</td>
        <td >'. $fila ["rfc"].'</td>
        <td>'. $fila ["apellidoPaterno"].'</td>
        <td>'. $fila ["apellidoMaterno"].'</td>
        <td>'. $fila ["direccion"].'</td>
        <td>'. $fila ["telefono"].'</td>';
}
?>
</table>