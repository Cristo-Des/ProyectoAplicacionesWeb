<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    
    // Arial bold 15
    $this->SetFont('Arial','B',9);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte1',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(35,10,'Matricula',1,0,'C',0);
    $this->Cell(30,10,'Fecha Venta',1,0,'C',0);
    $this->Cell(30,10,'Nombre Vendedor',1,0,'C',0);
    $this->Cell(30,10,'ApellidoP',1,0,'C',0);
    $this->Cell(30,10,'Precio',1,0,'C',0);
    $this->Cell(30,10,'Marca',1,0,'C',0);
    $this->Cell(30,10,'Modelo',1,1,'C',0);


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
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

include("Config.php");

$SELECT = "SELECT * FROM ventasaño";
$datos= mysqli_query ($con,$SELECT);

while ($fila = mysqli_fetch_array($datos))
{
    $pdf->Cell(35,10,$fila ["matriculaCoche"],1,0,'C',0);
    $pdf->Cell(30,10,$fila ["fechaVenta"],1,0,'C',0);
    $pdf->Cell(30,10,$fila ["nombre"],1,0,'C',0);
    $pdf->Cell(30,10,$fila ["apellidoPaterno"],1,0,'C',0);
    $pdf->Cell(30,10,$fila ["marca"],1,0,'C',0);
    $pdf->Cell(30,10,$fila ["modelo"],1,1,'C',0);
 
}
$pdf->Output();
?>