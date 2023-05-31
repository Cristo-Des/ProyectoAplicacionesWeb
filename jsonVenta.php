<?php
include("Config.php");

$SELECT = "SELECT idVenta, matriculaCoche, fechaVenta, vendedor.nombre, vehículo.marca FROM venta INNER JOIN vendedor ON venta.idVendedor = vendedor.idVendedor INNER JOIN vehículo ON venta.idVehículo = vehículo.idVehículo WHERE venta.estatus = 1";
$datos= mysqli_query ($con,$SELECT);

$userData = array();
while ($fila = mysqli_fetch_assoc($datos))
{
    $userData['Venta'][] = $fila;
}
echo json_encode($userData);
// Cerrar la conexión a la base de datos
mysqli_close($con);

header('Content-type: text/json');
header('Content-Disposition: attachment; filename="Venta.json"');
?>