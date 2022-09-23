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
    $this->Image('./css/medicalogo.jpg',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(45);
    //fecha
    $today = date("M, Y");
    $mes = strftime('%B');

    // Title
    $this->SetTextColor(90,90,90);
    $this->Cell(100,10,'Productos agotados: '. $mes ,1,0,'C');
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

$pdf->SetFontSize(20);
$pdf->SetFont('Arial','B');
$pdf->SetFillcolor(255,255,255);
$pdf->SetTextColor(45,45,45);
$pdf->SetDrawColor(88,88,88);
$pdf->cell(50,10,'Codigo',1,0,'C',1);
$pdf->cell(70,10,'Descripcion',1,0,'C',1);
$pdf->cell(70,10,'Proveedor',1,0,'C',1);
// $pdf->cell(35,10,'Fecha',1,0,'C',1);
$pdf->Ln(10);
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `productos` WHERE `existencia` = 0";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));
while($concepto = $resultado->fetch_object()){
    $prove = "SELECT `nombre` FROM `proveedores` WHERE id = $concepto->proveedor";
    $resultado1 = $conexion->query($prove) or die (mysqli_error($conexion));
    $proveedor = $resultado1->fetch_object();
    $pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    // $pdf->SetFont('Arial','B');
    // $pdf->cell(50,10,'Codigo',1,0,'C',1);
    // $pdf->cell(40,10,'Descripcion',1,0,'C',1);
    // $pdf->cell(40,10,'Proveedor',1,0,'C',1);
    // $pdf->cell(40,10,'Fecha',1,0,'C',1);
    // $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->cell(50,10,$concepto->codigo,1,0,'C',1);
    $pdf->cell(70,10,$concepto->descripcion,1,0,'C',1);
    $pdf->cell(70,10,$proveedor->nombre,1,0,'C',1);
    // $pdf->cell(35,10,$concepto->fecha,1,0,'C',1);
    $pdf->Ln(10);
    
}
$pdf->Ln(10);
$pdf->SetFontSize(12);
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    // $pdf->SetFont('Arial','B');
    // $pdf->cell(50,10,'Numero de Gatos',1,0,'C',1);
    // $pdf->cell(40,10,'Total de Gastos',1,0,'C',1);
    // $pdf->Ln(10);
    // $pdf->SetFontSize(12);
    // $pdf->SetFont('Arial','B');
    // $pdf->cell(50,10,$numerogastos,1,0,'C',1);
    // $pdf->cell(40,10,$totalgastos,1,0,'C',1);

$pdf->Output('Productos Agotados-'.$mes.'-del-'.$year.'.pdf','i');
?>