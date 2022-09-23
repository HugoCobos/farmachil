<?php 
session_start();
include_once "encabezado.php"; 
include_once "lateral.php"; 
// ini_set("display_errors","on"); error_reporting (E_ALL);
if($_SESSION['username'] != ''){
include 'conexion.php';
$busqueda = '';
$conexion = conecta_mysql();
$verdadera = "SELECT * FROM codigoBarras WHERE estado = 'inactivo'";
$resultado = $conexion -> query($verdadera);
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
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
	<div class="col-xs-12">
		<h1>Productos Alternos Activos</h1>
		<div>
			<!-- <form action="./productosAlternos.php" class="form-inline my-2 my-lg-0 navbar-right" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda" autofocus maxlength="10">
      <button class="btn btn-info my-2 my-sm-0" type="submit">Buscar</button>
    </form> -->
	<?php
	if (isset($_POST['busqueda'])) {
		$busqueda = $_POST['busqueda'];
		// echo $busqueda;
		$sentencia = "SELECT * FROM `codigoBarras` WHERE `codigo` LIKE  '%$busqueda%'";
		$resultado_busqueda = $conexion -> query($sentencia);
		?>
		<div class="table-responsive">
        <table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Código</th>
					<th>Descripción</th>
					<th>Estado</th>
					<th>Limpiar</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>	
				<?php if($producto_busqueda = $resultado_busqueda->fetch_object()){ ?>
				<tr>
					<td><?php echo $producto_busqueda->codigo ?></td>
					<td><?php echo $producto_busqueda->nombreProducto ?></td>
					<td><?php echo $producto_busqueda->estado ?></td>
					<td><a class="btn btn-success" href="./productosAlternos.php">
						<i class="fa fa-edit"></i></a></td>
					<td><a class="btn btn-warning" href="<?php echo "editarAlterno.php?id=" . $producto_busqueda->id?>">
						<i class="fa fa-edit"></i></a></td>
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
	<?php
	}
	
	?>
		</div>
		</div>
		<br>
		<div class="table-responsive">
        <table class="table table-striped table-sm">
			<thead>
				<tr>
                    <th>Código</th>
					<th>Descripción</th>
					<th>Estado</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>	
				<?php while($producto = $resultado->fetch_object()){ ?>
				<tr>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->nombreProducto ?></td>
					<td><?php echo $producto->estado ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editarAlterno.php?id=" . $producto->id?>">
						<i class="fa fa-edit"></i></a></td>
					<!-- Button trigger modal -->
					<td><a class="btn btn-danger" href="<?php echo "eliminar.php?id=" . $producto->id?>" data-href="<?php echo "eliminar.php?id=" . $producto->id?>">
						<i class="fa fa-trash"></i></a>
					
					</td>
				</tr>
				 
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- <div class="modal" id="confirmar-eliminar">
					<div class="modal-dialog" role="dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Confimación de eliminación</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
					</div>
						<div class="modal-body">
							<p><h1>El producto  <strong><?php //echo $producto->descripcion .' '. $producto->id ?></strong> será <font color="red">eliminado</p>
					</div>
						<div class="modal-footer">
						<a class="btn btn-danger"  name="eliminar" href="eliminar.php?id=<?php echo $producto->id; ?>"><i class="fa fa-trash"></i></a>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div> -->
		
					<script>
						$('#confirmar-eliminar').on('show.bs.modal', function(e) {
				$(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
				
				$('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
			});
					</script>

<?php include_once "pie.php"; 
}else{
	echo 'Favor de iniciar sesion <br /> 

		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>