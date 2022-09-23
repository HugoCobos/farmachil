<?php include_once "encabezado.php" ?>
<?php include_once "lateral.php" ?>
<?php
// ini_set("display_errors","on"); error_reporting (E_ALL);
include_once "base_de_datos.php";
include 'conexion.php';
$sentencia = $base_de_datos->query("SELECT ventas.total,ventas.tipo_pago, ventas.fecha, ventas.id, 
									GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
									AS productos 
									FROM ventas 
									INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id
									INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
									WHERE ventas.tipo_pago ='Efectivo'
									AND ventas.fecha  > DATE_SUB(NOW(), INTERVAL 1 DAY)
									GROUP BY ventas.id ORDER BY ventas.id DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

	<div class="container">
		<h1>Ventas</h1>
		<div>
			<a class="btn btn-success" href="./vender.php">Nueva <i class="fa fa-plus"></i></a>
			<a class="btn btn-primary" href="./informe_semanal.php">Informe Semanal <i class="fas fa-bars"></i></a>
			<a class="btn btn-primary" href="./informe_mensual.php">Informe Mensual <i class="fas fa-bars"></i></a>
			<a class="btn btn-danger" href="./ultimoRegistro.php">Eliminar Última Venta <i class="fas fa-bars"></i></a>
			<form action="./ventas.php" class="form-inline my-2 my-lg-0 navbar-right" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda" autofocus>
      <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
    </form>
		</div>
		<br>
		<?php
		if (isset($_POST['busqueda'])) {
		$conexion = conecta_mysql();
		$busqueda = $_POST['busqueda'];
		// echo $busqueda;

		$sentencia1 = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
			AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id
 			INNER JOIN productos ON productos.id = productos_vendidos.id_producto WHERE ventas.id = $busqueda 
			GROUP BY ventas.id ORDER BY ventas.id DESC;");
		
		$ventas1 = $sentencia1->fetchAll(PDO::FETCH_OBJ);
		?>
			<!-- Aqui empieza la prubea -->

			
				<?php 
				if(isset($_POST['busqueda'])){
				?>


<div class="table-responsive">
        <table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Limpiar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas1 as $venta1){ ?>
				<tr>
					<td><?php echo $venta1->id ?></td>
					<td><?php echo $venta1->fecha ?></td>
					<td>
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta1->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta1->total ?></td>
					<td><a class="btn btn-success" href="<?php echo "preFactura.php?id=" . $venta1->id?>"><i class="fa fa-print"></i></a></td>
					<td><a class="btn btn-success" href="./ventas.php">
						<i class="fa fa-edit"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

			
				<?php }else {
                    ?>
                    <h2>No existe ese producto</h2>
                    <?php
                
                ?>
	</div>
</div>
	<?php
				}
	}
	
	?>
		<div class="table-responsive">
        <table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Facturar</th>
					<!-- <th>Eliminar</th> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ ?>
				<tr>
					<td><?php echo $venta->id ?></td>
					<td><?php echo $venta->fecha ?></td>
					<td>
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><a class="btn btn-success" href="<?php echo "preFactura.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php include_once "pie.php" ?>