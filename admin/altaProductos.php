<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de Productos</title>
</head>
<body>
<?php
session_start();
if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'administrador') {
include 'header.php';
include 'lateral.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="../nuevo.php">
		<label for="codigo">Código de barras:</label>
		<input class="form-control" name="codigo" required type="text" id="codigo" autofocus placeholder="Escribe el código">

		<label for="descripcion">Descripción:</label>
		<textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="precioVenta">Precio de venta:</label>
		<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Precio de venta">

		<label for="precioCompra">Precio de compra:</label>
		<input class="form-control" name="precioCompra" required type="number" id="precioCompra" placeholder="Precio de compra">

		<label for="existencia">Existencia:</label>
    <input class="form-control" name="existencia" required type="number" id="existencia" placeholder="Cantidad o existencia">

    <label for="caducidad">Caducidad:</label>
    <input class="form-control" name="caducidad" required type="date" id="caducidad" >
    
    <br><br><input class="btn btn-info" type="submit" value="Guardar">
    <a class="btn btn-warning" href="./index.php">Cancelar</a>
	</form>
</div>

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
</body>
</html>