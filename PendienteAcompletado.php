<?php
session_start();
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
// UPDATE `pedidos` SET `recibido` = 'si' WHERE `pedidos`.`id` = 2;
$sentencia = $base_de_datos->prepare("UPDATE `pedidos` SET `recibido` = 'si' WHERE `pedidos`.`id` = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	if ($_SESSION['nivel'] == 'administrador') {
		header("Location: ./admin/pedidos.php");
	  }else{
		header("Location: ./pedidos.php");
	  }
	exit;
}
else echo "Algo salió mal";
?>