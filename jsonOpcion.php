<?php
include("Config.php");

$SELECT = "SELECT * FROM opcion WHERE estatus = 1";
$datos= mysqli_query ($con,$SELECT);

$userData = array();
while ($fila = mysqli_fetch_assoc($datos))
{
    $userData['Opcion'][] = $fila;
}
echo json_encode($userData);
// Cerrar la conexión a la base de datos
mysqli_close($con);

header('Content-type: text/json');
header('Content-Disposition: attachment; filename="Opcion.json"');
?>