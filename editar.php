<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include 'conexion.php';
include 'base_de_datos.php';
include_once 'numeroNegativo.php';
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
$conexion = conecta_mysql();
$prove = "SELECT * FROM `proveedores` WHERE `id` =".$producto->proveedor;
$resultado1 = $conexion->query($prove);
$hugo = $resultado1->fetch_object();
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

$producto->existencia = (!is_negative_number($producto->existencia)) ? $producto->existencia : 0 ;
 
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
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="codigo">Código de barras:</label>
			<input value="<?php echo $producto->codigo ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
			<label for="descripcion">Descripción:</label>
			<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"><?php echo $producto->descripcion ?></textarea>
			<label for="precioVenta">Precio de venta:</label>
			<input value="<?php echo $producto->precioVenta ?>" class="form-control" name="precioVenta" required type="number" step="0.01" id="precioVenta" placeholder="Precio de venta">
			<label for="precioCompra">Descuento:</label>
			<input class="form-control" name="descuento" value="<?php echo $producto->descuento?>" required type="text" id="caducidad" >
			<label for="existencia">Existencia:</label>
			<input value="<?php echo round($producto->existencia) ?>" class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">
			<label for="existencia">Caducidad:</label>
			<input value="<?php echo $producto->fecha ?>" class="form-control" name="caducidad" required type="date" id="existencia" placeholder="Cantidad o existencia">

			<label>Clave</label>
			<input type="text" name="clave" value="<?php echo $producto->clave; ?>" class="form-control" placeholder="10201010" maxlength="20">

			<label>ClaveSAT</label>
			<input type="text" name="clavesat" value="<?php echo $producto->clavesat; ?>" class="form-control" placeholder="10201010" maxlength="20">

			<label for="caducidad">Proveedor:</label>
			<?php
			$sentencia = "SELECT * FROM proveedores";
			$resultado = $conexion->query($sentencia);
			?>
			<select class="form-control" name="proveedor" required type="text" id="caducidad" >
				<option type="hidden" value="<?php echo $producto->proveedor?>"><?php echo $hugo->nombre; ?></option>
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
<?php include_once "pie.php" ?>