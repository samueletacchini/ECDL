<?php

require('fpdf/fpdf.php');
require('Fpdi.php');

//
//$pdf = new FPDF('P','mm','A4');
//$pdf->AddPage();
//$pdf->SetFont('Arial', 'B', 16);
//$pdf->Cell(40, 10, 'Hello World!');
//$pdf->Output();
//


$pdf = new FPDI();

$pdf->setSourceFile("skillscard.pdf");

?>
