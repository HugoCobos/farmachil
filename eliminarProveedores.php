<?php
session_start();
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM `proveedores` WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	if ($_SESSION['nivel'] == 'administrador') {
		header("Location: ./admin/index.php");
	  }else{
		header("Location: ./listar.php");
	  }
	exit;
}
else echo "Algo salió mal";
?>