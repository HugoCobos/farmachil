<?php
session_start();
if(!isset($_POST["total"])) exit;
ini_set("display_errors","on"); error_reporting (E_ALL);
date_default_timezone_set("America/Mexico_City");
$total = $_POST["total"];
$cambio = $_POST["cambio"];
$efectivo = $_POST["efectivo"];
$cama = $_POST["cama"];
$tipopago = $_POST['pago'];
$ahora = date("Y-m-d H:i:s");
include_once "base_de_datos.php";
include_once "conexionProductosPDO.php";

$sentencia = $base_de_datos->prepare("INSERT INTO ventas(fecha, total,id_paciente,tipo_pago) VALUES (?, ?, ?,?);");
$sentencia->execute([$ahora, $total, $cama, $tipopago]);

$sentencia = $base_de_datos->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$base_de_datos->beginTransaction();
$sentencia = $base_de_datos->prepare("INSERT INTO productos_vendidos(id_producto, id_venta, cantidad, precio_venta) VALUES (?, ?, ?, ?);");
$sentenciaExistencia = $base_de_datosProductos->prepare("UPDATE productos SET existencia = existencia - ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$sentencia->execute([$producto->id, $idVenta, $producto->cantidad, $producto->precioVenta]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
}

$base_de_datos->commit();

//solo imprime ticek si se fectua un cobro en caso contrario no genera tiket

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];
header("Location: ./vender.php?status=1");
?>