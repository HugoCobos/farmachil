<?php
session_start();
if(!isset($_POST["imp"])) header("Location: ./informe_mensual.php");
ini_set("display_errors","on"); error_reporting (E_ALL);
date_default_timezone_set("America/Mexico_City");
$ids = $_POST['imp'];
$ahora = date("Y-m-d H:i:s");
include_once "base_de_datos.php";

$productos = [];

foreach ($ids as $id ) {
    
	$consulta= $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id,
			GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
			AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
			INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
			WHERE ventas.tipo_pago ='Efectivo' 
			and ventas.fecha  > DATE_SUB(NOW(), INTERVAL 1 MONTH) 
			and ventas.id = $id
			GROUP BY ventas.id ORDER BY ventas.id DESC;");
    $consult = $consulta->fetchAll(PDO::FETCH_OBJ);
    $productos = array_merge($consult, $productos);
}


require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;


$nombre_impresora = 'EC-PM-5890X2'; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;

# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("./css/logo_farmacia.png", false);
	//$pdf->Image('./css/Icon.png',15,10,15);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

$printer->text("\n"."Farmacia Central" . "\n");
$printer->text("Direccion: 5 de mayo #660" . "\n");
$printer->text("San Juan Bautista, Tuxtepec" . "\n");
$printer->text("R.F.C: OAUJ560331DA1" . "\n");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");

$total = 0;

foreach($productos as $producto){

	foreach(explode("__", $producto->productos) as $productosConcatenados){
		$final = explode("..", $productosConcatenados);
		
		/*Alinear a la izquierda para la cantidad y el nombre*/
		$printer->setJustification(Printer::JUSTIFY_LEFT);
		//$printer->text(utf8_decode($productos->desproduct)."\n");
		$printer->text( utf8_decode('  '.$final[1]."\n").'   '. $final[2]."  pieza(s) " . $producto->fecha . "  \n");
		
	}
	$total += $producto->total;
$IVA = $total * 0.16;
$supertotal = $total + $IVA;
	
}
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/
$descuento = $total - $total2;
$printer->text(" -----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("SUBTOTAL: $".$total ."\n");

/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*Alimentamos el papel 3 veces*/
$printer->feed(3);

/*
	Cortamos el papel. Si nuestra impresora
	no tiene soporte para ello, no generará
	ningún error
*/
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/


	$printer->pulse();


/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

header("Location: ./informe_mensual.php");
?>