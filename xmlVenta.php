<?php
include("Config.php");

$SELECT = "SELECT idVenta, matriculaCoche, fechaVenta, vendedor.nombre, vehículo.marca FROM venta INNER JOIN vendedor ON venta.idVendedor = vendedor.idVendedor INNER JOIN vehículo ON venta.idVehículo = vehículo.idVehículo WHERE venta.estatus = 1";
$datos= mysqli_query ($con,$SELECT);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI("php://output");
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

while ($fila = mysqli_fetch_assoc($datos))
{
    $xml->startElement('registro');
    $xml->startElement('Matricula');
    $xml->writeRaw($fila['matriculaCoche']);
    $xml->endElement();
    $xml->startElement('NombreVendedor');
    $xml->writeRaw($fila['nombre']);
    $xml->endElement();
    $xml->startElement('MarcaVehiculo');
    $xml->writeRaw($fila['marca']);
    $xml->endElement();
    $xml->endElement(); // Fin del elemento registro
}
// Fin del elemento raíz
$xml->endElement();
$xml->endDocument();
$xml->flush();

// Cerrar la conexión a la base de datos
mysqli_close($con);

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Venta.xml"');
?>

