<?php
include 'conexion.php';
$conexion = conecta_mysql();
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$sentencia = "INSERT INTO `proveedores` (id, nombre, telefono, correo) 
                VALUES (null, '$nombre', $telefono, '$correo')";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));

if($resultado === TRUE){
	header("Location: ./listaProveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verificar";
?>