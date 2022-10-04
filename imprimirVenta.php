<?php
$id = $_POST['id'];
$nombres = $_POST['nombres'];
$telefono = $_POST['telefono'];
$rfc = $_POST['rfc'];
$domicilio = $_POST['domicilio'];
$colonia = $_POST['colonia'];
$cp = $_POST['cp'];
$email = $_POST['email'];
require('./fpdf182/fpdf.php');
include_once "base_de_datos.php";
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
    // date_default_timezone_set("America/Mexico_City");
    $mes = strftime('%B');
    $today = date("F, j, Y");

    // Title
    $this->SetTextColor(90,90,90);
    $this->Cell(100,10,'Venta a facturar',1,0,'C');
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

$pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(70,10,'Nombres',1,0,'C',1);
    $pdf->cell(55,10,'RFC',1,0,'C',1);
    $pdf->cell(70,10,'Domicilio',1,0,'C',1);
    
    // $pdf->cell(25,10,'',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(10);
    $pdf->SetFont('Arial','');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(70,10,$nombres,1,0,'C',1);
    $pdf->cell(55,10,$rfc,1,0,'C',1);
    $pdf->cell(70,10,$domicilio,1,0,'C',1);

    // $pdf->cell(25,10,"",1,0,'C',1);
    $pdf->Ln(20);

    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(70,10,'Colonia',1,0,'C',1);
    $pdf->cell(55,10,utf8_decode('Código Postal'),1,0,'C',1);
    $pdf->cell(70,10,'Correo',1,0,'C',1);
    
    // $pdf->cell(25,10,'',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(10);
    $pdf->SetFont('Arial','');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(70,10,$colonia,1,0,'C',1);
    $pdf->cell(55,10,$cp,1,0,'C',1);
    $pdf->cell(70,10,$email,1,0,'C',1);

    // $pdf->cell(25,10,"",1,0,'C',1);
    $pdf->Ln(20);
    
$totalventas = 0;
$numventas  = 0;
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, productos.clave, productos.clavesat,ventas.id, 
                                    GROUP_CONCAT( productos.codigo, '..', productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
                                    AS productos 
                                    FROM ventas 
                                    INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
                                    INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
                                    WHERE ventas.tipo_pago ='Efectivo' 
                                    AND ventas.fecha > DATE_SUB(NOW(), INTERVAL 1 WEEK) 
                                    AND ventas.id = $id GROUP BY ventas.id ORDER BY ventas.id DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach($ventas as $venta){
    $totalventas = $totalventas + $venta->total;
    $numventas++;
    $pdf->SetFontSize(20);
    $pdf->SetFont('Arial','B');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(40,10,'Fecha',1,0,'C',1);
    $pdf->cell(125,10,'Productos',1,0,'C',1);
    $pdf->cell(25,10,'Total',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','');
    $pdf->SetFillcolor(255,255,255);
    $pdf->SetTextColor(45,45,45);
    $pdf->SetDrawColor(88,88,88);
    $pdf->cell(40,10,$venta->fecha,1,0,'C',1);
    $pdf->cell(125,10,'',1,0,'C',1);
    $pdf->cell(25,10,"$".$venta->total,1,0,'C',1);
    $pdf->Ln(10);
        $pdf->SetFontSize(12);
        $pdf->SetFont('Arial','');
        $pdf->SetFillcolor(255,255,255);
        $pdf->SetTextColor(45,45,45);
        $pdf->SetDrawColor(88,88,88);
        $pdf->cell(40,10,"",0,0,'R',1);
        $pdf->cell(35,10,utf8_decode('Código'),1,0,'C',1);
        $pdf->cell(50,10,utf8_decode('Descripción'),1,0,'C',1);
        $pdf->cell(40,10,'Cantidad',1,0,'C',1);
        $pdf->Ln(10);

        foreach(explode("__", $venta->productos) as $productosConcatenados){ 
            $producto = explode("..", $productosConcatenados);
            $pdf->cell(40,10,"",0,0,'R',1);
            $pdf->cell(35,10,utf8_decode($producto[0]),1,0,'C',1);
            $pdf->cell(50,10,utf8_decode($producto[1]),1,0,'C',1);
            $pdf->cell(40,10,utf8_decode($producto[2]),1,0,'C',1);
            $pdf->Ln(10);
        }
    
    $pdf->Ln(10);
}
$pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->cell(15);
    $pdf->cell(40,10,'Ventas totales',1,0,'C',1);
    $pdf->cell(60,10,'SubTotal:',1,0,'C',1);
    $pdf->cell(60,10,'Total:',1,0,'C',1);
    $pdf->Ln(10);
    $pdf->SetFontSize(12);
    $pdf->SetFont('Arial','B');
    $pdf->cell(15);
    $pdf->cell(40,10,$numventas++,1,0,'C',1);
    $pdf->cell(60,10,"$".$totalventas,1,0,'C',1);
    $Total = ($totalventas * .16)+ $totalventas;

    $pdf->cell(60,10,"$".$Total,1,0,'C',1);
$pdf->Output('Reporte-Semanal-de-'.$semana.'-'.$mes.'-del-'.$year.'.pdf','i');
?>