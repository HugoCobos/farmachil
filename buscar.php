<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busqueda</title>
</head>
<body>
<?php
session_start();
include_once "encabezado.php";
ini_set("display_errors","on"); error_reporting (E_ALL);
if ($_SESSION['username'] != '' || $_SESSION['nivel'] == 'administrador') {
include './conexion.php';
$busqueda = $_POST['busqueda'];
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `productos` WHERE `codigo` LIKE  '%$busqueda%' 
               OR `descripcion` LIKE  '%$busqueda%'";
$resultado = $conexion -> query($sentencia);
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
<div class="container">
<table class="table table-bordered">
			<thead>
				<tr>
					<th>Caducidad</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
				</tr>
			</thead>
			<tbody>	
				<?php if($producto = $resultado->fetch_object()){ ?>
				<tr>
					<td><?php echo $producto->fecha ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo round($producto->existencia) ?></td>
				</tr>
				 
			</tbody>
		</table>
				<?php }else {
                    ?>
                    <h2>No existe ese producto</h2>
                    <?php
                } 
                ?>
	</div>
<a href="./listar.php"> <button class="btn btn-default">Regresar</button></a>
<?php
include_once "pie.php";
}else{
	echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</body>
</html>
