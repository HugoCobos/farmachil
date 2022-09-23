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
include 'conexion.php';
if($_SESSION['username'] != ''){
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
	<h1>Generar Gasto</h1>
	<form method="POST" action="generarGasto.php">
		<label for="codigo">Concepto:</label>
		<input required id="descripcion" name="concepto" class="form-control"></input>

		<label for="precioCompra">Precio de compra:</label>
		<input class="form-control" name="precio" required type="text" id="precioCompra" placeholder="Precio de compra">

		<label for="descripcion">Nota:</label>
		<textarea required id="descripcion" name="nota" cols="30" rows="5" class="form-control"></textarea>

		<br>

		<input class="btn btn-info" type="submit" value="Generar">
		<a href="./listaGastos.php" class="btn btn-danger" type="submit" value="Regresar">Regresar</a>

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
