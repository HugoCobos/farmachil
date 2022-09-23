<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) || 
	!isset($_POST["descripcion"]) || 
	!isset($_POST["id"]) ||
	!isset($_POST["estado"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$estado = $_POST['estado'];

$sentencia = $base_de_datos->prepare("UPDATE codigoBarras SET codigo = ?, nombreProducto = ?, estado = ? WHERE id = ?;");
$resultado = $sentencia->execute([$codigo, $descripcion, $estado, $id]);

if($resultado === TRUE){
	header("Location: ./productosAlternos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>