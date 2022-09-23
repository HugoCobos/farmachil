<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Factura</title>
</head>
<body>
<?php
session_start();
ini_set("display_errors","on"); error_reporting (E_ALL);
include_once "encabezado.php";
include_once "lateral.php";
include 'base_de_datos.php';
$id = $_GET['id'];
$totalventas = 0;
$numventas  = 0;
include_once "./base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT ventas.total, ventas.fecha, ventas.id,
 GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad SEPARATOR '__') 
AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
INNER JOIN productos ON productos.id = productos_vendidos.id_producto 
WHERE ventas.id = $id GROUP BY ventas.id ORDER BY ventas.id DESC;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>

	<div class="container">
		<center>
            <h1>Datos para facturar</h1>
        </center>
		<div>
        <form method="post" action="imprimirVenta.php">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
	
			<label for="codigo">Nombres:</label>
			<input  class="form-control" name="nombres" required type="text" id="codigo" placeholder="Escribe Nombre y apellidos">

			<label for="descripcion">Telefono:</label>
			<input required id="descripcion" name="telefono" class="form-control" placeholder="Ingrese el telefono">

			<label for="descripcion">RFC:</label>
			<input required id="descripcion" name="rfc" class="form-control" placeholder="Ingrese el RFC">
			
			<label for="descripcion">Domicilio:</label>
			<input required id="descripcion" name="domicilio" class="form-control" placeholder="Ingrese el domicilio">
			
			<label for="descripcion">Colonia:</label>
			<input required id="descripcion" name="colonia" class="form-control" placeholder="Ingrese la colonia">
			
			<label for="descripcion">Código Postal:</label>
			<input required id="descripcion" name="cp" class="form-control" type="number" placeholder="Ingrese el Código Postal">
			
			<label for="descripcion">Correo:</label>
			<input required id="descripcion" name="email" type="email" class="form-control" placeholder="Ingrese el correo">

			<br><br><input class="btn btn-info" type="submit" value="Imprimir">
			<a class="btn btn-warning" href="./informe_semanal.php">Cancelar</a>
		</form>
        <br><br>
	
    <table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
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
				</tr>
				<?php } ?>
			</tbody>
		</table>

		<table class="table">
			<thead>
				<tr>
				<th scope="col">Ventas totales</th>
				<th scope="col">SubTotal</th>
				<th scope="col">Total + IVA (16%)</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<td><?php echo $numventas ?></td>
				<td><?php echo '$' . $totalventas ?></td>
                <td><?php 
                $Total = ($totalventas * .16)+ $totalventas;
                echo '$' . $Total; ?></td>
				</tr>
			</tbody>
			</table>
        </div>
</body>
</html>
