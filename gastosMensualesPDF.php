<?php
require('./fpdf182/fpdf.php');
include 'conexion.php';
date_default_timezone_set("America/Mexico_City");
setlocale(LC_TIME,'es_MX.UTF-8');
$semana = strftime('%W');
$mes = strftime('%B');
$year = date("Y");
class PDF extends FPDF
{
    
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    $this->Image('./css/logo_farmacia.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(45);
    //fecha
    $today = date("M, Y");

    // Title
    $this->SetTextColor(90,90,90);
    $this->Cell(100,10,'Informe Mensual de  ' .$today ,1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'C');
}

}
    
// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// $pdf->SetFontSize(20);
// $pdf->SetFont('Arial','B');
// $pdf->SetFillcolor(255,255,255);
// $pdf->SetTextColor(45,45,45);
// $pdf->SetDrawColor(88,88,88);
// $pdf->cell(40,10,'Fecha',1,0,'C',1);
// $pdf->cell(125,10,'Productos',1,0,'C',1);
// $pdf->cell(25,10,'Total',1,0,'C',1);
// $pdf->Ln(10);
$totalgastos = 0;
$numerogastos = 0;
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `gastos` WHERE `fecha` BETWEEN CURRENT_DATE()-30 AND CURRENT_DATE()+1  ORDER BY fecha DESC";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));
while($concepto = $resultado->fetch_object()){
    $pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->SetFont('Arial','B');
    $pdf->cell(40,10,'Concepto',1,0,'C',1);
    $pdf->Write(10,$concepto->concepto);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->SetFont('Arial','B');
    $pdf->cell(40,10,'Nota',1,0,'C',1);
    $pdf->Write(10,$concepto->nota);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->SetFont('Arial','B');
    $pdf->cell(50,10);
    $pdf->cell(40,10,'Precio',1,0,'C',1);
    $pdf->cell(60,10,'Fecha',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->cell(50,10);
    $pdf->cell(40,10,$concepto->precio,1,0,'C',1);
    $pdf->cell(60,10,$concepto->fecha,1,0,'C',1);
    $pdf->Ln(25);
    $totalgastos = $totalgastos +  $concepto->precio;
    $numerogastos++;
}
$pdf->Ln(10);
$pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->SetFont('Arial','B');
    $pdf->cell(50,10,'Numero de Gatos',1,0,'C',1);
    $pdf->cell(40,10,'Total de Gastos',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->cell(50,10,$numerogastos,1,0,'C',1);
    $pdf->cell(40,10,$totalgastos,1,0,'C',1);

$pdf->Output('Gastos-Mensual-de-'.$mes.'-del-'.$year.'.pdf','i');
?>