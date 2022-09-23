 <?php 
 session_start();
 include_once "header.php";
  include_once "lateral.php"; 
include '../conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM `pedidos` WHERE `recibido` = 'no'";
$resultado = $conexion->query($sentencia) or die (mysqli_error($conexion));

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
<?php      
ini_set("display_errors","on"); error_reporting (E_ALL);
if($_SESSION['username'] != ''){
?>
<div class="container">
<a class="btn btn-success" href="./levantarPedidoAdmin.php">Nuevo <i class="fa fa-plus"></i></a>
<br><br>
	<h1>Pedidos Pendientes</h1>
    <div class="table-responsive">
        <table class="table">
      <thead class="table-light">
        <td>Asunto</td>
        <td>Pedido</td>
        <td>proveedor</td>
        <td>Fecha</td>
        <td>Recibida</td>
        <td>Eliminar</td>
      </thead>
      <?php while($pedido = $resultado->fetch_object()){ ?>
      <tbody>
      <td><?php echo $pedido->asunto; ?></td>
      <td><?php echo $pedido->pedido; ?></td>
      <td><?php echo $pedido->proveedor; ?></td>
      <td><?php echo $pedido->fecha; ?></td>
      <td><a class="btn btn-success" href="<?php echo "PendienteAcompletado.php?id=" . $pedido->id?>">
						<i class="fa fa-check"></i></a></td>
					<td><a class="btn btn-danger" href="<?php echo "eliminarPendiente.php?id=" . $pedido->id?>">
						<i class="fa fa-trash"></i></a>
					</td>
      </tbody>
      <?php
      } 
      ?>
    </table>
    </div>
</div>
<?php include_once "../pie.php";
}else{
	echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>