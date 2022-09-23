<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
<?php
session_start();
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "conexionProductosPDO.php";
include_once "base_de_datos.php";
$sentencia = $base_de_datosProductos->prepare("UPDATE `productos` SET `estado` = 'inactivo' WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
$sentencia1 = $base_de_datos->prepare("UPDATE `productos` SET `estado` = 'inactivo' WHERE id = ?;");
$resultado1 = $sentencia1->execute([$id]);
if($resultado === TRUE && $resultado1 === TRUE){
	if ($_SESSION['nivel'] == 'administrador') {
		header("Location: ./admin/index.php");
	  }else{
		header("Location: ./listar.php");
	  }
	exit;
}
else echo "Algo salió mal";
?>