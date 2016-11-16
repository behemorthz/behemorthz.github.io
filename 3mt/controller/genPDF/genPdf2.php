<?php 
require('fpdf.php');
define('FPDF_FONTPATH','font/');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetMargins(0,0,0);
$pdf->Image('bg.png', 0, 0, $pdf->GetPageWidth(), $pdf->GetPageHeight());
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->SetFont('THSarabunNew','',16);
for ($i=0; $i < 8; $i++) { 
	$pdf->Ln(8);
}



$pdf->Cell(40);
	$pdf->Cell(10,11,iconv( 'UTF-8','tis-620','สวัสดี ชาวไทยครีเอท'),0,1);

$pdf->Cell(40);
	$pdf->Cell(10,11,'Faculty',0,1);

$pdf->Cell(40);
	$pdf->Cell(10,11,'Major',0,1);

$pdf->Cell(80);
	$pdf->Cell(10,10,'Graduate',0,1);

$pdf->Cell(80);
	$pdf->Cell(10,11,'Title Presentation',0,1,'C');

$pdf->Cell(40);
	$pdf->Cell(10,11,'Title Presentation',0,1,'C');

$pdf->Cell(40);
	$pdf->Cell(40,11,'Advisor',0,1,'C');

$pdf->Output();

 ?>