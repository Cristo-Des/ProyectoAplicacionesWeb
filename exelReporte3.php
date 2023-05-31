<?php 
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=Reporte3_exportado_" . date('Y:m:d:m:s').".xls");
header("Pragma: no-cache"); 
header("Expires: 0");

include("Config.php");
$SELECT = "SELECT * FROM opcionmes";
$datos= mysqli_query ($con,$SELECT);
echo '<h1 aligne="center">Opciones</h1>
<table class="table table-striped table-hover table-bordered" align="center">
<th align="center" class="table-primary">Numero Opcion</th>
<th align="center" class="table-primary">Nombre</th>
<th align="center" class="table-primary">Descripcion</th>
<th align="center" class="table-primary">Matricula Coche</th>
<th align="center" class="table-primary">Mes</th>';

while ($fila = mysqli_fetch_array($datos))
{
    echo '<tr align="center"> <td>'. $fila ["nuOpcion"].'</td>
        <td >'. $fila ["nombre"].'</td>
        <td>'. $fila ["descripcion"].'</td>
        <td>'. $fila ["matriculaCoche"].'</td>
        <td>'. $fila ["MES"].'</td>';
}
?>
</table>