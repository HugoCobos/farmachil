
<?php
#Salir si alguno de los datos no está presente
session_start();
ini_set("display_errors","on"); error_reporting (E_ALL);
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"])) exit();

#Si todo va bien, se ejecuta esta parte del código...
include "conexion.php";
include_once "base_de_datos.php";
$conexion = conecta_mysql();
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];


$buscarProducto = "SELECT `codigo` FROM `codigoBarras` WHERE `codigo` = '$codigo'";
$result = $conexion->query($buscarProducto);
$count = mysqli_num_rows($result);

  if ($count == 1){ ?> 
  
  <div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">ERROR!</h4>
  <p>Ha ocurrido un error, al parecer un producto ya está registrado con ese código.</p>
  <hr>
</div>		 

<?php 
  
  exit();

 }else{

$sentencia = $base_de_datos->prepare("INSERT INTO codigoBarras (id, codigo, nombreProducto, estado) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([null, $codigo, $descripcion, 'activo']);
}

if($resultado === TRUE){
    header("Location: ./productosAlternos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>