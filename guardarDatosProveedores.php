<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["id"]) || 
	!isset($_POST["nombre"]) || 
	!isset($_POST["telefono"]) || 
	!isset($_POST["correo"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sentencia = $base_de_datos->prepare("UPDATE proveedores SET nombre = ?, telefono = ?, correo = ? WHERE id = ?;");
$resultado = $sentencia->execute([$nombre, $telefono, $correo, $id]);

if($resultado === TRUE){
	header("Location: ./listaProveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>