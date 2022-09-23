<?php
include 'conexion.php';
$conexion = conecta_mysql();
$concepto = $_POST['concepto'];
$precio = $_POST['precio'];
$nota = $_POST['nota'];
$sentencia = "INSERT INTO `gastos` (id, concepto, precio, nota, fecha) 
                VALUES (null, '$concepto', $precio, '$nota', CURRENT_TIMESTAMP)";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));

if($resultado === TRUE){
	header("Location: ./listaGastos.php");
	exit;
}
else echo "Algo salió mal. Por favor verificar";
?>