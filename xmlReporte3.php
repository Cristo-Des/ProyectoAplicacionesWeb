<?php
include("Config.php");

$SELECT = "SELECT * FROM opcionmes";
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
    $xml->startElement('NumeroOpcion');
    $xml->writeRaw($fila['nuOpcion']);
    $xml->endElement();
    $xml->startElement('nombre');
    $xml->writeRaw($fila['nombre']);
    $xml->endElement();
    $xml->startElement('descripcion');
    $xml->writeRaw($fila['descripcion']);
    $xml->endElement();
    $xml->startElement('Matruclaoche');
    $xml->writeRaw($fila['matriculaCoche']);
    $xml->endElement();
    $xml->startElement('mes');
    $xml->writeRaw($fila['MES']);
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
header('Content-Disposition: attachment; filename="Reporte3.xml"');
?>
