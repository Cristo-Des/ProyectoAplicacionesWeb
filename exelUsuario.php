<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Usuario_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM usuario WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);
echo '<table class="table table-striped table-hover table-bordered"align="center">
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Email</th>
<th align="center" class="table-primary">Password</th>
<th align="center" class="table-primary">Telefono</th>';


while ($fila = mysqli_fetch_array($datos))
{echo '<tr align="center"> <td>'. $fila ["nombre"].'</td>
        <td >'. $fila ["email"].'</td>
        <td>'. $fila ["clave"].'</td>
        <td >'. $fila ["telefono"].'</td>';
}
?>
</table>