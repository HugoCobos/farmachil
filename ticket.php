<?php
include "./fpdf182/fpdf.php";

$pdf = new FPDF($orientation='P',$unit='mm', array(45,350));
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->SetFont('Arial','B');
$pdf->SetFillcolor(255,255,255);
$pdf->SetTextColor(45,45,45);
$pdf->SetDrawColor(88,88,88);
$pdf->cell(40,10,'Fecha',1,0,'C',1);
$pdf->cell(125,10,'Productos',1,0,'C',1);
$pdf->cell(25,10,'Total',1,0,'C',1);
$pdf->Ln(10);

$total =0;
$off = $textypos+6;
$producto = array(
	"q"=>1,
	"name"=>"Computadora Lenovo i5",
	"price"=>100
);

$pdf->Cell(5,$textypos+6,'GRACIAS POR TU COMPRA ');

$pdf->output();