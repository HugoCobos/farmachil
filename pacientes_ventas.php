<?php include_once "encabezado.php" ?>
<?php include_once "lateral.php" ;
include_once 'base_de_datos.php';
include 'conexion.php';
$cama = $_GET['id_paciente'];
$totalventas = 0;
$numventas  = 0;
$conexion = conecta_mysql();
?>
<?php
// ini_set("display_errors","on"); error_reporting (E_ALL);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
		</div>
		<div class="container">

<?php
	$prueba = "SELECT * FROM paciente WHERE id_paciente = $cama";
		$resultado_prueba = $conexion->query($prueba);
	$pacientess = $resultado_prueba->fetch_object();
	
	$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
	AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
	INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
	GROUP BY ventas.id ORDER BY ventas.id DESC;");
	$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
	?>
		<h1>Ventas Del paciente: <?php echo $pacientess->nombre ?></h1>
		<div>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Cama</th>
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
									<!-- <td><a class="btn btn-danger" href="<?php //echo "editar_ventas.php?id=$producto[0] & idventa=$venta->id & cama=$cama"?>" data-href="<?php // echo  "editar_ventas.php?id=$producto[0] & idventa=$venta->id"?>">
						<i class="fa fa-trash"></i></a></td> -->
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total ?></td>
					<td><?php echo $pacientess->numero_cama ?></td>
					
					<!-- <td><?php // echo $venta->total; $totalventas = $totalventas +$venta->total; $numventas++ ?></td> -->
					<!-- <td><a class="btn btn-danger" href="<//?php echo "eliminarVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td> -->
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<table class="table">
			<thead class="thead-dark">
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
		<center><a href="./pacientes_inactivos.php"><button type="submit" class="btn btn-default"> Regresar</button></a></center>