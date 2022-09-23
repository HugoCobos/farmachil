<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Gastos</title>
</head>
<body>
<?php
session_start();
include 'encabezado.php';
include 'lateral.php';
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
<?php
ini_set("display_errors","on"); error_reporting (E_ALL);
if($_SESSION['username'] != ''){
    include 'conexion.php';
$conexion = conecta_mysql();
$sentencia = "SELECT * FROM proveedores";
$resultado = $conexion->query($sentencia);
?>

<div class="container">
	<h1>Generar Pedido</h1>
	<form method="POST" action="enviarCorreo.php">
		<label for="codigo">Asunto:</label>
		<input required id="descripcion" name="asunto" class="form-control"></input>

		<label for="descripcion">Pedido:</label>
		<textarea required id="descripcion" name="pedido" cols="30" rows="5" class="form-control" maxlength="500"></textarea>

		<label for="caducidad">Proveedor:</label>
		<select class="form-control" name="proveedor" required type="date" id="caducidad" >
		<option value="NADA">Ninguno</option>
		<?php
                        $j=0;
                        while($proveedor = $resultado->fetch_assoc())
                        { 
                        echo "<option value=".$proveedor['id'].">".$proveedor['nombre']."</option>";
                        }
                        echo "</select>";
                        ?>

		<br>

		<input class="btn btn-info" type="submit" value="Generar">
		<a href="./pedidos.php" class="btn btn-danger" type="submit" value="Regresar">Regresar</a>

	</form>
</div>

<?php
include 'pie.php';

}else{
	echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</body>
</html>
