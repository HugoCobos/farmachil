<?php
include_once 'conexionProductos.php';
$conexion = conecta_productos();

$sentencia = "SELECT descripcion FROM productos WHERE estado = 'activo'";
$resultado = $conexion->query($sentencia) or die ('Hubo un error ' . mysqli_error($conexion));
$producto = $resultado->fetch_all(MYSQLI_ASSOC);
echo json_encode($producto);
?>