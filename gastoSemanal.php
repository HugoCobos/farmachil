<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gastos</title>
</head>
<body>
<?php
session_start();
if($_SESSION['username'] != ''){
include 'encabezado.php';
include 'lateral.php';
include 'conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `gastos` WHERE `fecha` BETWEEN CURRENT_DATE()-7 AND CURRENT_DATE()+1  ORDER BY fecha DESC";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));
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
<h1>Gastos Semanales</h1>
		<div>
			<a class="btn btn-success" href="./gastos.php">Generar Gasto <i class="fa fa-plus"></i></a>
			<a class="btn btn-info" href="./gastoSemanalPDF.php">Generar PDF <i class="fa fa-plus"></i></a>
			<a class="btn btn-primary" href="./gastosMensuales.php">Gastos Mensuales <i class="fa fa-bars"></i></a>
            <a class="btn btn-danger navbar-right" href="./ultimoGasto.php">Cancelar Último Gasto <i class="fas fa-bars"></i></a>
            </div>
<table class="table ">
			<thead>
				<tr>
					<th>Concepto</th>
					<th>Nota</th>
					<th>Precio</th>
					<th>Fecha</th>
				</tr>
			</thead>
			<tbody>	
				<?php while($concepto = $resultado->fetch_object()){ ?>
				<tr>
					<td><?php echo $concepto->concepto ?></td>
					<td><?php echo $concepto->nota ?></td>
					<td><?php echo $concepto->precio ?></td>
					<td><?php echo $concepto->fecha ?></td>
				</tr>
			</tbody>
				<?php }
                    ?>
                    </table>
	</div>

<?php
}else{
    echo 'Favor de iniciar sesion <br /> 
    <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</body>
</html>
