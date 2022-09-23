<?php include_once "encabezado.php" ?>
<?php include_once "lateral.php" ?>
<?php
$totalventas = 0;
$numventas  = 0;
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id,
									GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
									AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
									INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
									WHERE ventas.tipo_pago ='Efectivo' 
									and ventas.fecha  > DATE_SUB(NOW(), INTERVAL 1 MONTH) 
									GROUP BY ventas.id ORDER BY ventas.id DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
		</div>
		
	<div class="container">
		<h1>Informe Mensual</h1>
		<div>
			<a class="btn btn-primary" href="./informe_mensualpdf.php">Generar PDF <i class="fas fa-bars"></i></a>
		</div>
		<form action="imprimir_selec.php" method="POST" class="my-3">
		<div>
			<button type="submit" class="btn btn-primary">Imprimir seleccionados <i class="fas fa-bars"></i></button>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Facturar</th>
					<th>Selec.</th>
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
					<td><?php echo $venta->total; $totalventas = $totalventas +$venta->total; $numventas++ ?></td>
					<td><a class="btn btn-success" href="<?php echo "preFactura.php?id=" . $venta->id?>"><i class="fa fa-print"></i></a></td>
					<td><input type="checkbox" name="imp[]" value="<?php echo $venta->id ?>"></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</table>
		<table class="table">
			<thead>
				<tr>
				<th scope="col">Ventas totales</th>
				<th scope="col">Total ingresos</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td><?php echo $numventas ?></td>
				<td><?php echo  $totalventas ?></td>
				</tr>
			</tbody>
			</table>
	</div>
<?php include_once "pie.php" ?>