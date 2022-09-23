<?php
if (!isset($_POST["codigo"])) {
    return;
}

include_once "conexion.php";
$codigo = $_POST["codigo"];
$conexion = conecta_mysql();

	$sentencia = "SELECT * FROM productos WHERE `codigo` = $codigo  and estado = 'activo' LIMIT 1 ";
	$sentencia = $conexion->query($sentencia) or die ('Hubo un error ' . mysqli_error($conexion));

$producto = $sentencia->fetch_object();

$descuento = $producto->descuento;
$descuento1 = 100 - $descuento;
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./vender.php?status=4");
    exit;
}
# Si no hay existencia...
if ($producto->existencia < 1) {
    header("Location: ./vender.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = 1;
    if($producto->descuento != 0){
        $producto->total = $producto->precioVenta * "0.$descuento1";
        $producto->precioVenta = $producto->precioVenta;
    }else{
        $producto->total = $producto->precioVenta;
        $producto->precioVenta = $producto->precioVenta;
    }
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
    if ($cantidadExistente + 1 > $producto->existencia) {
        header("Location: ./vender.php?status=5");
        exit;
    }
    if($producto->descuento != 0){
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta * "0.$descuento1";
    $_SESSION["carrito"][$indice]->precioVenta = $producto->precioVenta;
    }else{
    $_SESSION["carrito"][$indice]->cantidad++;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->precioVenta;
    $_SESSION["carrito"][$indice]->precioVenta =  $_SESSION["carrito"][$indice]->precioVenta ;
   
}
    
}
header("Location: ./vender.php?codigo=$codigo");
