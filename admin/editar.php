<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "../base_de_datos.php";
include '../conexion.php';
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM proveedores";
$resultado = $conexion->query($sentencia);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "header.php" ?>
<?php include_once "lateral.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
		</div>	
		
		<div class="container">
		<h1>Editar producto: <?php echo $producto->descripcion; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>

			<label for="precioVenta">Precio de venta:</label>
			<input value="<?php echo $producto->precioVenta ?>" class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

			<label for="precioCompra">Precio de compra:</label>
			<input value="<?php echo $producto->precioCompra ?>" class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

			<label for="existencia">Existencia:</label>
			<input value="<?php echo round($producto->existencia) ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">

			<label for="existencia">Caducidad:</label>
			<input value="<?php echo $producto->fecha ?>" class="form-control" name="caducidad" required type="date" id="existencia" placeholder="Cantidad o existencia">
			<label for="caducidad">Proveedor:</label>
			
			<select class="form-control" name="proveedor" required type="date" id="caducidad" >
			<?php
                        $j=0;
                        while($proveedor = $resultado->fetch_assoc())
                        { 
                        echo "<option value=".$proveedor['id'].">".$proveedor['nombre']."</option>";
                        }
                        echo "</select>";
                        ?>
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "../pie.php" ?>
