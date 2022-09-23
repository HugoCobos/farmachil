<?php include_once "encabezado.php";
 	  include_once "lateral.php";
include 'conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM proveedores";
$resultado = $conexion->query($sentencia);
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
<div class="container">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevoCodigoBarras.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" maxlength="10" autofocus placeholder="Escribe el código" >

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control" maxlength="100"></textarea>

		
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>