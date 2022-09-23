<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["descuento"]) || 
	!isset($_POST["precioVenta"]) || 
	!isset($_POST["existencia"]) || 
	!isset($_POST["id"]) ||
	!isset($_POST["caducidad"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...
include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$descuento = $_POST["descuento"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];
$caducidad = $_POST["caducidad"];
$proveedor = $_POST["proveedor"];
$clave = $_POST["clave"];
$clavesat = $_POST["clavesat"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET fecha = ?, codigo = ?, descripcion = ?, precioVenta = ?, 
												existencia = ?, proveedor = ?, descuento = ?, clave = ?, clavesat = ? WHERE id = ?;");
$resultado = $sentencia->execute([$caducidad, $codigo, $descripcion, $precioVenta, $existencia, $proveedor, $descuento, $clave, $clavesat, $id]);

$sentencia1 = $base_de_datos->prepare("UPDATE productos SET fecha = ?, codigo = ?, descripcion = ?, precioVenta = ?, 
										existencia = ?, proveedor = ?, descuento = ?, clave = ?, clavesat = ? WHERE id = ?;");
$resultado1 = $sentencia1->execute([$caducidad, $codigo, $descripcion, $precioVenta, $existencia, $proveedor, $descuento, $clave, $clavesat, $id]);

if($resultado === TRUE && $resultado1 === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>