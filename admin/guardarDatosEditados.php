<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["precioCompra"]) || 
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
$precioCompra = $_POST["precioCompra"];
$precioVenta = $_POST["precioVenta"];
$existencia = $_POST["existencia"];
$caducidad = $_POST["caducidad"];
$proveedor = $_POST["proveedor"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET fecha = ?, codigo = ?, descripcion = ?, precioCompra = ?, precioVenta = ?, existencia = ?, proveedor = ? WHERE id = ?;");
$resultado = $sentencia->execute([$caducidad, $codigo, $descripcion, $precioCompra, $precioVenta, $existencia, $proveedor, $id]);

if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>