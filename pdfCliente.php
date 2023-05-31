<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(90,10,'Tabla Cliente',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(17,10,'Nombre',1,0,'C',0);
    $this->Cell(34,10,'RFC',1,0,'C',0);
    $this->Cell(30,10,'ApellidoP',1,0,'C',0);
    $this->Cell(30,10,'ApellidoM',1,0,'C',0);
    $this->Cell(90,10,'Direccion',1,0,'C',0);
    $this->Cell(28,10,'Telefono',1,0,'C',0);
    $this->Cell(22,10,'Fecha Venta',1,1,'C',0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

include("Config.php");

$SELECT = "SELECT idCliente, nombre, rfc, apellidoPaterno, apellidoMaterno, direccion, telefono, venta.fechaVenta FROM cliente INNER JOIN venta ON cliente.idVenta = venta.idVenta WHERE cliente.estatus = 1";
$datos= mysqli_query ($con,$SELECT);

while ($fila = mysqli_fetch_array($datos))
{
    $pdf->Cell(17,10,$fila ["nombre"],1,0,'B',0);
    $pdf->Cell(34,10,$fila ["rfc"],1,0,'B',0);
    $pdf->Cell(30,10,$fila ["apellidoPaterno"],1,0,'B',0);
    $pdf->Cell(30,10,$fila ["apellidoMaterno"],1,0,'B',0);
    $pdf->Cell(90,10,$fila ["direccion"],1,0,'B',0);
    $pdf->Cell(28,10,$fila ["telefono"],1,0,'B',0);
    $pdf->Cell(22,10,$fila ["fechaVenta"],1,1,'B',0);
}
$pdf->Output();
?>

