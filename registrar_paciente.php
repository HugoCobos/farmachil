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
$verdadera = "SELECT * FROM paciente WHERE status = 1";
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
<h2>Registrar Paciente</h2>
<form action="./crearPaciente.php" method="POST">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombres</label>
      <input type="text" name="nombres" class="form-control" id="inputEmail4" maxlength="50" autofocus required>
    </div>
    
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Cama</label>
      <select id="inputState" class="form-control" name="cama" required>
        <option selected>Elegir...</option>
        <option value="Urgencias">Urgencias</option>
        <option value="Cama 1">Cama 1</option>
        <option value="Cama 2">Cama 2</option>
        <option value="Cama 3">Cama 3</option>
        <option value="Cama 4">Cama 4</option>
        <option value="Cama 5">Cama 5</option>
        <option value="Cama 6">Cama 6</option>
        <option value="Cama 7">Cama 7</option>
        <option value="Cama 8">Cama 8</option>
        <option value="Cama 9">Cama 9</option>
        <option value="Cama 10">Cama 10</option>
        <option value="Incubadora">Incubadora</option>
        <option value="Ambulatorio 1">Ambulatorio 1</option>
        <option value="Ambulatorio 2">Ambulatorio 2</option>
        <option value="Ambulatorio 3">Ambulatorio 3</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-outline-success">Registrar paciente</button>
  <a class="btn btn-outline-danger" href="./pacientes_inactivos.php">Listar pacientes dados de alta</a>
</form>
<div class="table-responsive">
        <center><h2>Pacientes Activos</h2></center>
      <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nombre</th>
			        <th>Cama</th>
              <th>Modificar</th>
              <th>Dar de alta</th>
            </tr>
          </thead>
          <tbody>
          <?php while($producto = $resultado->fetch_object()){ ?>
            <tr>
					<td><?php echo $producto->nombre; ?></td>
					<td><?php echo $producto->numero_cama; ?></td>
					<td><a class="btn btn-secondary" href="<?php echo "editarPaciente.php?paciente=" . $producto->id_paciente?>">
          
                    <i class="fas fa-pen-square"></i></a></td>
					<td><a class="btn btn-primary" href="<?php echo "dar_deAlta.php?paciente=" . $producto->nombre?>" data-href="<?php echo "eliminarUsuario.php?id=" . $producto->username?>">
						<i class="fa fa-user"></i></a>
					</td>
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