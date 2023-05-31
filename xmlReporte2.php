<?php
include("Config.php");

$SELECT = "SELECT * FROM sesionescliente2022";
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
    $xml->startElement('Precio');
    $xml->writeRaw($fila['precioTransaccion']);
    $xml->endElement();
    $xml->startElement('modelo');
    $xml->writeRaw($fila['modelo']);
    $xml->endElement();
    $xml->startElement('marca');
    $xml->writeRaw($fila['marca']);
    $xml->endElement();
    $xml->startElement('fechaCesion');
    $xml->writeRaw($fila['fechaCesion']);
    $xml->endElement();
    $xml->startElement('nombre');
    $xml->writeRaw($fila['nombre']);
    $xml->endElement();
    $xml->startElement('ApellidoP');
    $xml->writeRaw($fila['apellidoPaterno']);
    $xml->endElement();
    $xml->startElement('ApellidoM');
    $xml->writeRaw($fila['apellidoMaterno']);
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
header('Content-Disposition: attachment; filename="Reporte2.xml"');
?>

