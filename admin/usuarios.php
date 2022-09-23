<?php
include_once "../conexion.php";
$conexion = conecta_mysql();
$verdadera = "SELECT * FROM usuarios";
$resultado = $conexion -> query($verdadera);
session_start();
if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'administrador') {
include 'header.php';
include 'lateral.php';
?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Share</button> -->
            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->
          </div>
          <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
        </div>
      </div>

      <a href="./nuevoUsuario.php"><button type="button" class="btn btn-sm btn-outline-success">Nuevo Usuario</button></a>
      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <center><h2>Usuarios</h2></center>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nombre</th>
			        <th>Apellidos</th>
			        <th>Usuario</th>
			        <th>Categoria</th>
			        <th>Editar</th>
			        <th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
          <?php while($producto = $resultado->fetch_object()){ ?>
            <tr>
					<td><?php echo $producto->nombre; ?></td>
					<td><?php echo $producto->apellidos; ?></td>
					<td><?php echo $producto->username; ?></td>
					<td><?php echo $producto->nivel; ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarUsuario.php?username=" . $producto->username?>">
                    <i class="fas fa-pen-square"></i></a></td>
					<!-- Button trigger modal -->
					<td><a class="btn btn-danger" href="<?php echo "eliminarUsuario.php?username=" . $producto->username?>" data-href="<?php echo "eliminarUsuario.php?id=" . $producto->username?>">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php } ?>
          </tbody>
        </table>
      </div>
    </main>
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
