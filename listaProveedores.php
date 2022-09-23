<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
</head>
<body>
<?php
session_start();
if ($_SESSION['username'] != '') {
    include 'conexion.php';
    include 'encabezado.php';
    include 'lateral.php';
    $conexion = conecta_mysql();
    $sentencia = "SELECT * FROM `proveedores`";
    $resultado = $conexion->query($sentencia) or die (mysql_error($conexion));

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>

<div class="container">
		<h1>Proveedores</h1>
		<div>
			<a class="btn btn-success" href="./proveedor.php">Nuevo <i class="fa fa-plus"></i></a>
            </div>
            <table class="table ">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Correo</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>	
				<?php while($concepto = $resultado->fetch_object()){ 
                    ?>
				<tr>
					<td><?php echo $concepto->nombre ?></td>
					<td><?php echo $concepto->telefono ?></td>
					<td><?php echo $concepto->correo ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarProveedores.php?id=" . $concepto->id?>">
						<i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarProveedores.php?id=" . $concepto->id?>" data-href="<?php echo "eliminarProveedores.php?id=" . $producto->id?>">
						<i class="fa fa-trash"></i></a></td>
				</tr>
			</tbody>
				<?php }
                    ?>
                    </table>
	</div>

<?php
include 'pie.php';
}else{
	echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</body>
</html>
