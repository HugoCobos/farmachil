<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Nuevo Usuario</title>
</head>
<body>
<?php
session_start();
include_once "./conexion.php";
$conexion = conecta_mysql();
$verdadera = "SELECT * FROM paciente WHERE status = 0";
$resultado = $conexion -> query($verdadera);

if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'farmacia') {
include 'encabezado.php';
include 'lateral.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>
<div class="container">
<div class="table-responsive">
        <center><h2>Pacientes Inactivos</h2></center>
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nombre</th>
			        <th>Cama</th>
              <th>Historial</th>
            </tr>
          </thead>
          <tbody>
          <?php while($producto = $resultado->fetch_object()){ ?>
            <tr>
					<td><?php echo $producto->nombre; ?></td>
					<td><?php echo $producto->numero_cama; ?></td>
					 <td><a class="btn btn-secondary" href="<?php echo "pacientes_ventas.php?id_paciente=" . $producto->id_paciente?>">
                    <i class="fas fa-pen-square"></i></a></td>
				</tr>
				<?php } ?>
          </tbody>
        </table>
      </div>
  </div>

<?php
}else {
?>
<center>
<h1>No tienes permiso para esta vista</h1><br>
<a href="../index.html"><button class="btn btn-danger">Regresar</button></a>
</center>
<?php
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="dashboard.js"></script></body>
</html>


</body>
</html>