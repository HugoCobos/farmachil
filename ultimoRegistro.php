<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Registro</title>
</head>
<?php
session_start();
include_once "encabezado.php";
include_once "lateral.php";
ini_set("display_errors","on"); error_reporting (E_ALL);
if ($_SESSION['username'] != '' || $_SESSION['nivel'] == 'administrador') {
include './base_de_datos.php';
$sentencia = $base_de_datos->query("SELECT ventas.total,ventas.fecha, ventas.id,
									GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__')
									AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
									INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
									WHERE ventas.fecha BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE()+1  
									GROUP BY ventas.id ORDER BY ventas.id DESC LIMIT 1;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>

<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Eliminar</th>
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
					<td><a class="btn btn-danger" href="<?php echo "eliminarUltimaVenta.php?id=" . $venta->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>
<?php
include_once "pie.php";
}else{
	echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</html>