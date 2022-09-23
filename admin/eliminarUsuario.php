<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
<?php
ini_set("display_errors","on"); error_reporting (E_ALL);
if(!isset($_GET["username"])) exit();
$id = $_GET["username"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE username = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
	header("Location: ./usuarios.php");
	exit;
}
else echo "Algo salió mal";
?>