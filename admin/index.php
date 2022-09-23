<?php
include_once "../conexion.php";
$conexion = conecta_mysql();
$verdadera = "SELECT * FROM productos";
$resultado = $conexion -> query($verdadera);
session_start();
if ($_SESSION['username'] != '') {
  include 'header.php';
  include 'lateral.php';
?>
<!doctype html>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <a href="../formulario.php"><button type="button" class="btn btn-sm btn-outline-secondary">Nuevo Producto</button></a> -->
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

      <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

      <h2>Productos</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
            <th>Código</th>
			<th>Descripción</th>
			<th>Precio de compra</th>
			<th>Precio de venta</th>
			<th>Existencia</th>
			<th>Editar</th>
			<th>Eliminar</th>
            </tr>
          </thead>
          <tbody>
          <?php while($producto = $resultado->fetch_object()){ ?>
            <tr>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioCompra ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo round($producto->existencia) ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>">
                    <i class="fas fa-pen-square"></i></a></td>
					<!-- Button trigger modal -->
					<td><a class="btn btn-danger" href="<?php echo "../eliminar.php?id=" . $producto->id?>" data-href="<?php echo "eliminar.php?id=" . $producto->id?>">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="dashboard.js"></script></body>
</html>
