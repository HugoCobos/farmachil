
<?php
#Salir si alguno de los datos no está presente
session_start();
ini_set("display_errors","on"); error_reporting (E_ALL);
if(!isset($_POST["codigo"]) || !isset($_POST["descripcion"]) || !isset($_POST["precioVenta"]) || !isset($_POST["descuento"]) || !isset($_POST["existencia"])) exit();

#Si todo va bien, se ejecuta esta parte del código...
include_once "conexionProductos.php";
include_once "conexionProductosPDO.php";
include_once "base_de_datos.php";

$conexion = conecta_productos();
$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$descuento = $_POST["descuento"];
$existencia = $_POST["existencia"];
$caducidad = $_POST["caducidad"];
$proveedor = $_POST["proveedor"];
$clave = $_POST["clave"];
$clavesat = $_POST["clavesat"];

$proveedor = (is_numeric($proveedor)) ? $proveedor : 6 ;

$buscarProducto = "SELECT `codigo` FROM `productos` WHERE `codigo` = '$codigo'";
$result = $conexion->query($buscarProducto);
$count = mysqli_num_rows($result);

  if ($count == 1){ ?> 
  
  <div class="alert alert-warning" role="alert">
  <h4 class="alert-heading">ERROR!</h4>
  <p>Ha ocurrido un error, al parecer un producto ya está registrado con ese código.</p>
  <hr>
  <?php
  if ($_SESSION['nivel'] == 'administrador') {?>
    <a href="./admin/altaProductos.php" class="mb-0"><button class="btn btn-danger">Regresar</button></a>
    <?php
  }else{?>
    <a href="./formulario.php" class="mb-0"><button class="btn btn-danger">Regresar</button></a>
    <?php
  }
  ?>
</div>		 

<?php 
  
  exit();

 }else{

$sentencia = $base_de_datosProductos->prepare("INSERT INTO productos (id,fecha, codigo, descripcion, precioVenta, existencia, proveedor, estado, clave, clavesat, descuento) 
                                              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([NULL,$caducidad, $codigo, $descripcion, $precioVenta, $existencia, $proveedor, 'activo', $clave, $clavesat, $descuento]);
$sentencia1 = $base_de_datos->prepare("INSERT INTO productos (id,fecha, codigo, descripcion, precioVenta, existencia, proveedor, estado, clave, clavesat, descuento) 
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado1 = $sentencia1->execute([NULL,$caducidad, $codigo, $descripcion, $precioVenta, $existencia, $proveedor, 'activo', $clave, $clavesat, $descuento]);
}

if($resultado === TRUE && $resultado1 === TRUE){
  if ($_SESSION['nivel'] == 'administrador') {
    header("Location: ./admin/index.php");
  }else{
    header("Location: ./listar.php");
  }
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
<?php include_once "pie.php" ?>