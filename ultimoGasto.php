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
include './conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `gastos` ORDER BY id DESC LIMIT 1";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));
?>
<body>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>


<table class="table table-bordered">
<table class="table ">
			<thead>
				<tr>
					<th>Concepto</th>
					<th>Nota</th>
					<th>Precio</th>
					<th>Fecha</th>
					<th>Cancelar</th>
				</tr>
			</thead>
			<tbody>	
				<?php while($concepto = $resultado->fetch_object()){ ?>
				<tr>
					<td><?php echo $concepto->concepto ?></td>
					<td><?php echo $concepto->nota ?></td>
					<td><?php echo $concepto->precio ?></td>
					<td><?php echo $concepto->fecha ?></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarGasto.php?id=" . $concepto->id?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			</tbody>
				<?php }
                    ?>
                    </table>
	</div>
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