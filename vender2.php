<?php 
session_start();
include_once "encabezado.php";
include './lateral.php';
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
$tipopago = "";
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

	<div class="container"> 
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-danger">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>
		<form method="post" action="agregarAlCarrito.php">
			<label for="codigo">Código de barras:</label>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		</form>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
					?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<!-- tipo pago tarjeta -->
		<form method="post">
			<label for="tarjeta">Tarjeta</label>
			<input type="hidden"   autocomplete="off"  class="form-control" name="tarjeta"  id="tarjeta" value = '<?php echo $granTotal ?>' readonly> <p>
		    <button type="submit" class="btn btn-success">Tarjeta</button>
		</form>
		<!-- tipo pago efectivo -->
		<form method="post">
			<label for="Efectivo">Efectivo</label>
			<input autocomplete="off" autofocus class="form-control" name="efectivo" required type="text" id="efectivo" 
					placeholder="Efectivo recibido">
		</form>
		<h3>Total: <?php echo $granTotal; ?></h3>
		<?php
			if(!empty($_POST["efectivo"]) or !empty($_POST["tarjeta"]) ){
				if(!empty($_POST["tarjeta"])){
					$efectivo = $_POST["tarjeta"];
					  $cambio = $efectivo - $granTotal;
					  $tipopago = "Tarjeta";
				}else{
				  $efectivo = $_POST["efectivo"];
				  $cambio = $efectivo - $granTotal;
				  $tipopago = "Efectivo";
				}
				
				?>
			<h3>Cambio: <?php echo $cambio; ?></h3>
			<form action="./terminarVenta.php" method="POST">
			<label for="cama" >Número de cama</label>
			<select class="form-control" name="cama">
				<option value="0">Sin registro</option>
				<option value="1">1</option>
	  			<option value="2">2</option>
	  			<option value="3">3</option>
	  			<option value="4">4</option>
	  			<option value="5">5</option>
	  			<option value="6">6</option>
	  			<option value="7">7</option>
	  			<option value="8">8</option>
	  			<option value="9">9</option>
	  			<option value="10">10</option>
	  			<option value="corta estancia 1">corta estancia 1</option>
	  			<option value="corta estancia 2">corta estancia 2</option>
	  			<option value="corta estancia 3">corta estancia 3</option>
	  			<option value="urgencias">urgencias</option>
	  			<option value="incubadora">incubadora</option>
	  			<option value="cunero">cunero</option>
			</select>	
			
			<input name="cambio" type="hidden" value="<?php echo $cambio;?>">
			<input name="efectivo" type="hidden" value="<?php echo $efectivo;?>"> 
			
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">

			<input name="pago" type="hidden" value="<?php echo $tipopago?>">
			<?php	
			// Jorge este es el condicional

			//if(!empty($producto->id)){?>
				<button type="submit" class="btn btn-success">Terminar venta</button>
				
			
			
		<?php } ?>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
		<br>
		</form>
	</div>
<?php include_once "pie.php" ?>




<form method="post" action="vender.php">
		<?php
			include 'conexion.php';
			$conexion = conecta_mysql();
			$sentencia = "SELECT * FROM paciente WHERE status = 1";
			$resultado = $conexion->query($sentencia);
			
			?>
			<select class="form-control" name="paciente" required type="date" id="caducidad" >
				<option  value="null">SELECCIONA AL PACIENTE</option>
			<?php
                        $j=0;
                        while($paciente = $resultado->fetch_assoc())
                        { 
                        echo "<option value=".$paciente['id_paciente'].">".$paciente['nombre']."</option>";
                        }
                        echo "</select>";
                        ?>
						<button type="submit" class="btn btn-success">Seleccionar</button>

		</form>
