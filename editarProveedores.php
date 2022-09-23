<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
include 'conexion.php';
$sentencia = $base_de_datos->prepare("SELECT * FROM proveedores WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}
 
?>
<?php include_once "encabezado.php" ?>
<?php include_once "lateral.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
		</div>	
		
		<div class="container">
		<h1>Editar producto: <?php echo $producto->descripcion; ?></h1>
		<form method="post" action="guardarDatosProveedores.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">

			<label for="descripcion">Nombre:</label>
			<input required id="descripcion" name="nombre" class="form-control" value="<?php echo $producto->nombre ?>">

			<label for="precioVenta">Telefono:</label>
			<input value="<?php echo $producto->telefono ?>" class="form-control" name="telefono" required type="number" id="precioVenta" placeholder="Precio de venta">

			<label for="precioCompra">Correo:</label>
			<input value="<?php echo $producto->correo ?>" class="form-control" name="correo" required type="email" id="precioCompra" placeholder="Precio de compra">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
