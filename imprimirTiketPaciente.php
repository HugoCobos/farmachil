<?php
session_start();
if(!isset($_GET["id_paciente"])) exit;
ini_set("display_errors","on"); error_reporting (E_ALL);
date_default_timezone_set("America/Mexico_City");
$ncama = $_GET["cama"];
$ahora = date("Y-m-d H:i:s");
include_once "base_de_datos.php";
$id_paciente = $_GET['id_paciente'];

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
	$logo = EscposImage::load("./css/logo_farmacia.png", false);
	//$pdf->Image('./css/Icon.png',15,10,15);
    $printer->bitImage($logo);
}catch(Exception $e){/*No hacemos nada si hay error*/}

$printer->text("\n"."Farmacia Central" . "\n");
$printer->text("Direccion: 5 de mayo #660" . "\n");
$printer->text("San Juan Bautista, Tuxtepec" . "\n");
//$printer->text("Tel: 454664544" . "\n");
#La fecha también
// date_default_timezone_set("America/Mexico_City");
$printer->text("cama: ".$ncama."\n");

$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");

$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, 
    GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad 
    SEPARATOR '__') 
	AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
	INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
	GROUP BY ventas.id ORDER BY ventas.id DESC;");
    $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach ($ventas as $venta) {
        foreach (explode("__", $venta->productos) as $productosConcatenados) {
            $producto = explode("..", $productosConcatenados);

	/*Alinear a la izquierda para la cantidad y el nombre*/
	$printer->setJustification(Printer::JUSTIFY_LEFT);
    // $printer->text(utf8_decode($productos->desproduct)."\n");
    $printer->text( $producto[0]."\n");
    $printer->text( utf8_decode($producto[1]."\n"));
    $printer->text( utf8_decode($producto[2]."\n"));
	//if
	
}
    }
/*
	Terminamos de imprimir
	los productos, ahora va el total
*/



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
$printer->pulse();


/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

//////////////////////////////////////////



header("Location: ./ventas_cama");
