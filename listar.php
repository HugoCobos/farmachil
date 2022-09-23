<?php
session_start();
include_once "encabezado.php";
include_once "lateral.php";
ini_set("display_errors", "on");
error_reporting(E_ALL);
if ($_SESSION['username'] != '') {
	include 'conexion.php';
	include_once 'numeroNegativo.php';
	$busqueda = '';
	$conexion = conecta_mysql();
	$verdadera = "SELECT * FROM productos WHERE estado = 'activo' ORDER BY descripcion ASC";
	$resultado = $conexion->query($verdadera);

?>
	<!-- Aqui empieza lo que vamos a copiar y pegar -->
	<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
				</div>
			</div>
		</div>
		<!-- Aqui termina -->
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<div class="col-xs-12">
			<h1>Productos</h1>
			<div>
				<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
				<form action="./listar.php" class="form-inline my-2 my-lg-0 navbar-right" method="POST">
					<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda" autofocus>
					<button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
				</form>
				<?php
				if (isset($_POST['busqueda'])) {
					$busqueda = $_POST['busqueda'];
					// echo $busqueda;
					$sentencia = "SELECT * FROM `productos` WHERE estado = 'activo' and `codigo` LIKE  '%$busqueda%' 
               		   OR `descripcion` LIKE  '%$busqueda%' LIMIT 5 ";
					$resultado_busqueda = $conexion->query($sentencia) or die (mysqli_error($conexion));
				?>
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th>Caducidad</th>
									<th>Código</th>
									<th>Descripción</th>
									<th>Precio de venta</th>
									<th>Existencia</th>
									<th>Editar</th>
									<th>Eliminar</th>
									<th>Limpiar</th>
								</tr>
							</thead>
							<tbody>
								<?php if ($producto_busqueda = $resultado_busqueda->fetch_object()) { 
									$producto_busqueda->existencia = (!is_negative_number($producto_busqueda->existencia)) ? $producto_busqueda->existencia : 0 ;?>
									<tr>
										<td><?php echo $producto_busqueda->fecha ?></td>
										<td><?php echo $producto_busqueda->codigo ?></td>
										<td><?php echo $producto_busqueda->descripcion ?></td>
										<td><?php echo $producto_busqueda->precioVenta ?></td>
										<td><?php echo round($producto_busqueda->existencia) ?></td>
										<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto_busqueda->id ?>">
												<i class="fa fa-edit"></i></a></td>
										<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto_busqueda->id ?>" data-href="<?php echo "eliminar.php?id=" . $producto->id ?>">
												<i class="fa fa-trash"></i></a></td>
										<td><a class="btn btn-success" href="./listar.php">
												<i class="fa fa-edit"></i></a></td>
									</tr>

							</tbody>
						</table>
					<?php } else {
					?>
						<h2>No existe ese producto</h2>
					<?php
								}
					?>
					</div>
				<?php
				}

				?>
			</div>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr>
						<th>Caducidad</th>
						<th>Código</th>
						<th>Descripción</th>
						<th>Precio de venta</th>
						<th>Existencia</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($producto = $resultado->fetch_object()) { 
						$producto->existencia = (!is_negative_number($producto->existencia)) ? $producto->existencia : 0 ;?>
						<tr>
							<td><?php echo $producto->fecha ?></td>
							<td><?php echo $producto->codigo ?></td>
							<td><?php echo $producto->descripcion ?></td>
							<td><?php echo $producto->precioVenta ?></td>
							<td><?php echo round($producto->existencia) ?></td>
							<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id ?>">
									<i class="fa fa-edit"></i></a></td>
							<!-- Button trigger modal -->
							<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id ?>" data-href="<?php echo "eliminar.php?id=" . $producto->id ?>">
									<i class="fa fa-trash"></i></a>

							</td>
						</tr>

					<?php } ?>
				</tbody>
			</table>
		</div>

	<?php include_once "pie.php";
} else {
	echo 'Favor de iniciar sesion <br /> 

		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
	?>