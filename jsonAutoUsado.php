<?php
include("Config.php");

$SELECT = "SELECT precioTransaccion, marca, modelo, matricula, cliente.nombre, fechaCesion FROM autousado INNER JOIN cliente ON autousado.idCliente = cliente.idCliente WHERE autousado.estatus = 1";
$datos= mysqli_query ($con,$SELECT);
$userData = array();
while ($fila = mysqli_fetch_assoc($datos))
{
    $userData['AutosUsados'][] = $fila;
}
echo json_encode($userData);
// Cerrar la conexión a la base de datos
mysqli_close($con);

header('Content-type: text/json');
header('Content-Disposition: attachment; filename="AutoUsado.json"');
?>