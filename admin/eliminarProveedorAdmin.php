<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>	
<?php
session_start();
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM proveedores WHERE id = ?;");
$resultado = $sentencia->execute([$id]);
if($resultado === TRUE){
        header("Location: ./listaProveedoresAdmin.php");
        exit;
    }else{
         echo "Algo salió mal";
	  }
?>