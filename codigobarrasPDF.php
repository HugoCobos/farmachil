<?php
    ini_set("display_errors","on"); error_reporting (E_ALL);
	require './fpdf182/fpdf.php';
	require './conexion.php';
    include './generadordecodigos.php';
    $conexion = conecta_mysql();
	
	$sql = "SELECT * FROM codigoBarras";
	$resultado = $conexion->query($sql);
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetAutoPageBreak(true, 20);
	$y = $pdf->GetY();
	
	while ($row = $resultado->fetch_assoc()){
		
		$code = $row['codigo'];
		$nombre = $row['nombreProducto'];
		$pdf->SetFont('Arial','B');
		$pdf->SetFillcolor(255,255,255);
		$pdf->SetTextColor(45,45,45);
		$pdf->SetDrawColor(88,88,88);
		barcode('codigos/'.$code.'.png', $code, 20, 'horizontal', 'code128', true);
		$pdf->Image('codigos/'.$code.'.png',10,$y,70,0,'PNG');
		$pdf->cell(90);
		$pdf->cell(50,10,$nombre,1,0,'C',1);
		   
		$pdf->ln(25);
		
		$y = $y+25;
	}
	$pdf->Output('Productos Alternos.pdf','D');
	
?>