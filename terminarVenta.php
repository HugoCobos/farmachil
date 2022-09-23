<?php
session_start();
if(!isset($_POST["total"])) exit;
ini_set("display_errors","on"); error_reporting (E_ALL);
date_default_timezone_set("America/Mexico_City");
$total = $_POST["total"];
$total2 = $_POST["total"];
$cambio = $_POST["cambio"];
$efectivo = $_POST["efectivo"];
$tipopago = $_POST['pago'];
$ahora = date("Y-m-d H:i:s");
include_once "base_de_datos.php";

$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total, tipo_pago) VALUES (?, ?, ?);");
$sentencia->execute([$ahora, $total, $tipopago]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $base_de_datos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}

$base_de_datos->commit();

/////////////////////////////////////////



require __DIR__ . '/ticket/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control
*/

$nombre_impresora = 'EC-PM-5890X2'; 


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;
/*
	Vamos a imprimir un logotipo
	opcional. Recuerda que esto
	no funcionará en todas las
	impresoras

	Pequeña nota: Es recomendable que la imagen no sea
	transparente (aunque sea png hay que quitar el canal alfa)
	y que tenga una resolución baja. En mi caso
	la imagen que uso es de 250 x 250
*/


///////////////////$Recycle.Bin
# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("./css/drugstore.jpg", false);
	//$pdf->Image('./css/Icon.png',15,10,15);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

$printer->text("\n"."Farmacia Central" . "\n");
$printer->text("Direccion: 5 de mayo #660" . "\n");
$printer->text("San Juan Bautista, Tuxtepec" . "\n");
$printer->text("R.F.C: OAUJ560331DA1" . "\n");
//$printer->text("Tel: 454664544" . "\n");
#La fecha también
// date_default_timezone_set("America/Mexico_City");
$printer->text("FOLIO: ".$idVenta."\n");

$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");

$total = 0;
$consulta = $base_de_datos->query("SELECT `cantidad`,productos.descripcion as desproduct, productos.precioVenta as precio 
FROM productos_vendidos,productos 
WHERE `id_venta` = ".$idVenta." and productos.id = productos_vendidos.id_producto;");
$productos = $consulta->fetchAll(PDO::FETCH_OBJ);
foreach($productos as $productos){

	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    // $printer->text(utf8_decode($productos->desproduct)."\n");
    $printer->text( utf8_decode('  '.$productos->desproduct."\n").'   '. $productos->cantidad."  pieza(s)  $".$productos->precio ." $".($productos->precio * $productos->cantidad) ."   \n");
	//if
	$total = $total + ($productos->precio * $productos->cantidad);
	
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
$printer->text("DESCUENTO: $".$descuento ."\n");
$printer->text("TOTAL: $".$total2 ."\n");
//$printer->text("IVA: $IVA\n");
//$printer->text("TOTAL: $".$supertotal."\n");

if($tipopago == "Efectivo"){
	$printer->text("EFECTIVO: $".$efectivo."\n");
	$printer->text("CAMBIO: $".$cambio."\n");
}else{
	$printer->text("TIPO PAGO: ".$tipopago."\n\n");
	$printer->text(" -----------------------------"."\n");
}



/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");



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

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

//////////////////////////////////////////


# Vamos a alinear al centro lo próximo que imprimamos
$printer->setJustification(Printer::JUSTIFY_CENTER);

/*
	Intentaremos cargar e imprimir
	el logo
*/
try{
	$logo = EscposImage::load("./css/drugstore.jpg", false);
	//$pdf->Image('./css/Icon.png',15,10,15);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

$printer->text("\n"."Farmacia Central" . "\n");
$printer->text("Direccion: 5 de mayo #660" . "\n");
$printer->text("San Juan Bautista, Tuxtepec" . "\n");
$printer->text("R.F.C: OAUJ560331DA1" . "\n");
//$printer->text("Tel: 454664544" . "\n");
#La fecha también
// date_default_timezone_set("America/Mexico_City");
$printer->text("FOLIO: ".$idVenta."\n");


if($valor_cama = $resultado->fetch_object()){

	$printer->text("CAMA: ".$valor_cama->numero_cama."\n");
}
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");

$total = 0;
$consulta = $base_de_datos->query("SELECT `cantidad`,productos.descripcion as desproduct, productos.precioVenta as precio 
FROM productos_vendidos,productos 
WHERE `id_venta` = ".$idVenta." and productos.id = productos_vendidos.id_producto;");
$productos = $consulta->fetchAll(PDO::FETCH_OBJ);
foreach($productos as $productos){

	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    // $printer->text(utf8_decode($productos->desproduct)."\n");
    $printer->text( utf8_decode('  '.$productos->desproduct."\n").'   '. $productos->cantidad."  pieza(s)  $".$productos->precio ." $".($productos->precio * $productos->cantidad) ."   \n");
	//if
	$total = $total + ($productos->precio * $productos->cantidad);
	
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
$printer->text("DESCUENTO: $".$descuento ."\n");
$printer->text("TOTAL: $".$total2 ."\n");
//$printer->text("IVA: $IVA\n");
//$printer->text("TOTAL: $".$supertotal."\n");

if($tipopago == "Efectivo"){
	$printer->text("EFECTIVO: $".$efectivo."\n");
	$printer->text("CAMBIO: $".$cambio."\n");
}else{
	$printer->text("TIPO PAGO: ".$tipopago."\n\n");
	$printer->text(" -----------------------------"."\n");
}



/*
	Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");



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

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

//////////////////////////////////////////

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>