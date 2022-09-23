<?php include_once "encabezado.php";
 	  include_once "lateral.php";
include 'conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM proveedores";
$resultado = $conexion->query($sentencia);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
<div class="container">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" autofocus placeholder="Escribe el código">
		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>
		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required  type="number" step="0.01" id="precioVenta" placeholder="Precio de venta">
		<label for="precioCompra">Descuento:</label>
		<input class="form-control" name="descuento" required type="number" placeholder="30%">
		
		<label for="existencia">Existencia:</label>
		<input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">

		<label for="clave">Clave</label>
		<input class="form-control" name="clave" type="text" placeholder="1029387" maxlength="20">

		<label for="clave">ClaveSAT</label>
		<input class="form-control" name="clavesat" type="text" placeholder="1029387" maxlength="20">

		<label for="caducidad">Caducidad:</label>
		<input class="form-control" name="caducidad" required type="date" id="caducidad" >
		<label for="caducidad">Proveedor:</label>
		<select class="form-control" name="proveedor" required type="date" id="caducidad" >
		<option value="NADA">Ninguno</option>
		<?php
                        $j=0;
                        while($proveedor = $resultado->fetch_assoc())
                        { 
                        echo "<option value=".$proveedor['id'].">".$proveedor['nombre']."</option>";
                        }
                        echo "</select>";
                        ?>
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>