<?php

use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
require('fpdf17/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
//$pageCount = $pdf->setSourceFile('skillscard.pdf');
//$pageId = $pdf->importPage(1, PdfReader\PageBoundaries::MEDIA_BOX);
//
//$pdf->addPage();
//$pdf->useImportedPage($pageId, 10, 10, 90);

$pdf = new FPDF();

//metto l'immagine

$pdf->AddPage();
$pdf->Image('pdf.png', 0, 0, 210, 297);
$pdf->SetFont('Arial', '', 11);




//n skill card
$pdf->SetXY(39, 58); 
$pdf->Write(0, "98993");

//rilasciata il
$pdf->SetXY(98, 57.5); 
$pdf->Write(0, "rilasciata"); 

//codice fiscale
$pdf->SetXY(42, 69); 
$pdf->Write(0, "codice fiscale"); 

//sesso
$pdf->SetXY(140, 69); 
$pdf->Write(0, "sesso"); 

//cognome
$pdf->SetXY(42, 77); 
$pdf->Write(0, "cognome"); 

//data di nascita
$pdf->SetXY(140, 77.5); 
$pdf->Write(0, "data di nascita"); 

//nome
$pdf->SetXY(42, 86); 
$pdf->Write(0, "nome"); 

//luogo di nascita
$pdf->SetXY(140, 86); 
$pdf->Write(0, "luogo di nascita"); 

//stato civile
$pdf->SetXY(128, 94.5); 
$pdf->Write(0, "stato civile"); 

//indirizzo
$pdf->SetXY(42, 103); 
$pdf->Write(0, "indirizzo"); 

//cap
$pdf->SetXY(158, 103); 
$pdf->Write(0, "cap"); 

//provincia
$pdf->SetXY(42, 111.5); 
$pdf->Write(0, "provincia"); 

//città
$pdf->SetXY(97, 111.5); 
$pdf->Write(0, "citta"); 

//stato
$pdf->SetXY(158, 111.5); 
$pdf->Write(0, "stato"); 

//tel
$pdf->SetXY(39, 120); 
$pdf->Write(0, "tel"); 

//email
$pdf->SetXY(97, 120); 
$pdf->Write(0, "email"); 

//cellulare
$pdf->SetXY(97, 128.5); 
$pdf->Write(0, "cellulare"); 

//scolarita
$pdf->SetXY(41.5, 145.7); 
$pdf->Write(0, "scolarita"); 

//occupazione
$pdf->SetXY(140, 145.5); 
$pdf->Write(0, "occupazione"); 

//scuola e classe
$pdf->SetXY(97, 154.2); 
$pdf->Write(0, "scuola e classe"); 

//modena DATA
$pdf->SetXY(39, 215); 
$pdf->Write(0, "DATA"); 


$pdf->Output();
?>

