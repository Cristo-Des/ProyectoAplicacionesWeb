<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Reporte1_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM ventasaño";
$datos= mysqli_query ($con,$SELECT);
echo '<h1 aligne="center">Ventas De Lo Que Va Del Año</h1>
<table class="table table-striped table-hover table-bordered" align="center">
<th align="center" class="table-primary">Matricula Coche</th>
<th align="center" class="table-primary">Fecha Venta</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Apellido P</th>
<th align="center" class="table-primary">Precio Transaccion</th>
<th align="center" class="table-primary">Marca</th>
<th align="center" class="table-primary">Modelo</th>';

while ($fila = mysqli_fetch_array($datos))
{
    echo '<tr align="center"> <td>'. $fila ["matriculaCoche"].'</td>
        <td >'. $fila ["fechaVenta"].'</td>
        <td>'. $fila ["nombre"].'</td>
        <td>'. $fila ["apellidoPaterno"].'</td>
        <td>'. $fila ["precioTransaccion"].'</td>
        <td>'. $fila ["marca"].'</td>
        <td>'. $fila ["modelo"].'</td>';
}
?>
</table>