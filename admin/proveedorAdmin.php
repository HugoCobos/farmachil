<?php 
session_start();
include_once "header.php" ?>
<?php include_once "lateral.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>
<div class="container">
	<h1>Nuevo Proveedor</h1>
	<form method="POST" action="nuevoProveedorAdmin.php">
		<label for="codigo">Nombre:</label>
		<input class="form-control" name="nombre" required type="text" id="codigo" autofocus placeholder="Nombre">

		<label for="precioVenta">Telefono:</label>
		<input class="form-control" name="telefono" maxlength="10" required type="text" id="precioVenta" placeholder="Telefono">
        
        <label for="codigo">Correo:</label>
		<input class="form-control" name="correo" required type="email" id="codigo" autofocus placeholder="Correo@ejemplo.com">
		<br><br>
        
        <input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>