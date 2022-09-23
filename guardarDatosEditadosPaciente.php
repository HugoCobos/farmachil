<?php
ini_set("display_errors","on"); error_reporting (E_ALL);
#Salir si alguno de los datos no está presente
if(
	!isset($_POST["id_paciente"]) || 
	!isset($_POST["nombre"]) || 
	!isset($_POST["cama"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id_paciente"];
$nombre = $_POST["nombre"];
$numero_cama = $_POST["cama"];


$sentencia = $base_de_datos->prepare("UPDATE paciente SET nombre = ?, numero_cama = ? WHERE id_paciente = ?;");
$resultado = $sentencia->execute([$nombre, $numero_cama, $id]);

if($resultado === TRUE){
	header("Location: ./registrar_paciente.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>