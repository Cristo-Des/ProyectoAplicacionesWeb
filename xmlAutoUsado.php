<?php
include("Config.php");

$SELECT = "SELECT precioTransaccion, marca, modelo, matricula, cliente.nombre, fechaCesion FROM autousado INNER JOIN cliente ON autousado.idCliente = cliente.idCliente WHERE autousado.estatus = 1";
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
    $xml->startElement('PrecioTransaccion');
    $xml->writeRaw($fila['precioTransaccion']);
    $xml->endElement();
    $xml->startElement('Marca');
    $xml->writeRaw($fila['marca']);
    $xml->endElement();
    $xml->startElement('Modelo');
    $xml->writeRaw($fila['modelo']);
    $xml->endElement();
    $xml->startElement('Matricula');
    $xml->writeRaw($fila['matricula']);
    $xml->endElement();
    $xml->startElement('Nombre');
    $xml->writeRaw($fila['nombre']);
    $xml->endElement();
    $xml->startElement('FechaSesion');
    $xml->writeRaw($fila['fechaCesion']);
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
header('Content-Disposition: attachment; filename="AutoUsado.xml"');
?>

