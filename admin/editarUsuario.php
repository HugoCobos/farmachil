<?php
session_start();
if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'administrador') {
	include 'header.php';
	include 'lateral.php';
	ini_set("display_errors","on"); error_reporting (E_ALL);
	if(!isset($_GET["username"])) exit();
		$username = $_GET["username"];
		include_once "../base_de_datos.php";
		$sentencia = $base_de_datos->prepare("SELECT * FROM usuarios WHERE username = ?;");
		$sentencia->execute([$username]);
		$producto = $sentencia->fetch(PDO::FETCH_OBJ);
			if($producto === FALSE){
				echo "¡No existe alguien con ese Usuario!";
				exit();
}
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
           
        </div>
      </div>
	  <h1>Editar Usuario: <?php echo $producto->nombre . ' '. $producto->apellidos .  '<br />  Usuario: ' . $producto->username; ?></h1>
        <div class="form-group col-md-7">
			<form method="POST" action="./modificarUsuario.php">
			        
						<label for="codigo">Nombre:</label>
						<input value="<?php echo $producto->nombre ?>" class="form-control" name="nombre" required type="text" id="codigo" placeholder="Escribe el Nombre" maxlength="50">
			
						<label for="descripcion">Apellidos:</label>
						<input required id="descripcion" name="apellidos" cols="30" rows="5" class="form-control" value="<?php echo $producto->apellidos ?>" maxlength="50"></input>
			
						<label for="precioVenta">Usuario:</label>
						<input value="<?php echo $producto->username ?>" class="form-control" name="username" required type="text" id="precioVenta" placeholder="Usuario" maxlength="30">
			
						<label for="precioCompra">Contraseña:</label>
						<input value="<?php echo $producto->password ?>" class="form-control" name="password" required type="text" id="precioCompra" placeholder="Precio de compra" maxlength="10">
			
						<label for="existencia">Nivel:</label>
						<input value="<?php echo $producto->nivel ?>" class="form-control" name="nivel" required type="text" id="existencia" placeholder="Farmacia">
						<br><br><input class="btn btn-info" type="submit" value="Guardar">
						<a class="btn btn-warning" href="./usuarios.php">Cancelar</a>
					</form>
		</div>
      </div>
    </main>
  </div>
</div>
<?php
}else{
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