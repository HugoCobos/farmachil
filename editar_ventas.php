<?php
session_start();
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
$idventas = $_GET["idventa"];

include 'conexion.php';
include_once 'conexionProductos.php';
$conexion = conecta_mysql();
$conexionNuevaProducto = conecta_productos();

$error = "<br> <a href='./ventas_cama.php' type='button' class='btn btn-danger'>Regresar</a>";

$prueba = "SELECT id, precioVenta FROM productos WHERE id = $id";
$resultado_prueba = $conexion->query($prueba) or die ( 'Error al encontrar el producto' . mysqli_error( $conexion ) . $error);
$res = $resultado_prueba->fetch_object();
print_r( $res );
if ( $res ) { // Validamos que haya producto con ese id
	$prueba2 = "SELECT cantidad FROM productos_vendidos WHERE `id_producto` = $res->id and `id_venta` = $idventas LIMIT 1";
	$resultado_prueba2 = $conexion->query( $prueba2 ) or die ( 'Error al seleccionar la cantidad de los productos' . mysqli_error( $conexion ) . $error);
	$res2 = $resultado_prueba2->fetch_object();

	if ( $res2 ) { // validamos que haya la cantidad del producto que se vendio
		$sentencia  = "DELETE FROM productos_vendidos WHERE `id_producto` = $res->id and `id_venta` = $idventas LIMIT 1";
		$res3 = $conexion->query( $sentencia ) or die ( 'Error al eliminar el producto de la lista de venta' . mysqli_error( $conexion ) . $error);

		if ( $res3 ) {
			$sentencia3 = "UPDATE `ventas` SET `total` = `total`- ($res->precioVenta * $res2->cantidad) WHERE `id` = $idventas";
			$res4 = $conexion->query($sentencia3) or die ( 'Error al actualizar el precio de la venta final' . mysqli_error( $conexion ) . $error);

			if ( $res4 ) {
				$sentencia4 = "UPDATE `productos` SET `existencia` = `existencia` + $res2->cantidad WHERE `id` = $res->id";
				$res4 = $conexion->query( $sentencia4 ) or die ( 'Erroe al regresar el producto al inventario' . mysqli_error( $conexion ) . $error);
				$res5 = $conexionNuevaProducto->query( $sentencia4 ) or die ( 'Erroe al regresar el producto al inventario' . mysqli_error( $conexion ) . $error);

				if($res4 === TRUE){

					mysqli_close( $conexion );
    
					if ($_SESSION['nivel'] == 'administrador') {
						header("Location: ./ventas_cama.php?");
					  }else{
					   header("Location: ./ventas_cama.php");
					 }
				   exit;
			   }
			   else echo "Algo salió mal";
			} else {
				echo 'Hubo un problema al regresar el producto al inventario';
			}
			
		} else {
			echo 'No se pudo actualizar el total de la venta';
		}
		
	} else {
		echo 'No se pudo eliminar el producto de la lista de "productos vendidos"';
	}
	
} else {
	echo 'No se encontro el producto por el id';
}
//4781