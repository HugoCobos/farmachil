<?php 
session_start();
include_once "encabezado.php"; 
include_once "lateral.php"; 
ini_set("display_errors","on"); error_reporting (E_ALL);
if($_SESSION['username'] != ''){
include 'conexion.php';
$conexion = conecta_mysql();
$verdadera = "SELECT * FROM productos WHERE `existencia` = 0";
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
		<h1>Productos Agotados</h1>
		<div>
        <a class="btn btn-info" href="./productosAgotadosPDF.php">Generar PDF <i class="fa fa-plus"></i></a>
		</div>
		</div>
		<br>
		<div class="table-responsive">
        <table class="table table-striped table-sm">
			<thead>
				<tr>
					<th>Caducidad</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>	
				<?php while($producto = $resultado->fetch_object()){ ?>
				<tr>
					<td><?php echo $producto->fecha ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta ?></td>
					<td><?php echo round($producto->existencia) ?></td>
					<td><a class="btn btn-warning" href="<?php echo "editar.php?id=" . $producto->id?>">
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