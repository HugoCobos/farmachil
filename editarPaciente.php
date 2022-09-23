<?php
if(!isset($_GET["paciente"])) exit();
ini_set("display_errors","on"); error_reporting (E_ALL);
$id = $_GET["paciente"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM paciente WHERE id_paciente = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
// $conexion = conecta_mysql();

if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}
 
?>
<?php include_once "encabezado.php" ?>
<?php include_once "lateral.php" ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
		</div>	
		
		<div class="container">
		<h1>Editar Paciente: <?php echo $producto->nombre; ?></h1>
		<form method="post" action="guardarDatosEditadosPaciente.php">
			<input type="hidden" name="id_paciente" value="<?php echo $producto->id_paciente; ?>">
	
			<label for="codigo">Nombres:</label>
			<input value="<?php echo $producto->nombre; ?>" class="form-control" name="nombre" required type="text" id="codigo" placeholder="<?php echo $producto->nombre; ?>" maxlength="50">

			<label for="descripcion">Cama:</label>
			<select class="form-control" name="cama" required type="text" id="caducidad" >
				<option type="text" value="<?php echo $producto->numero_cama?>"><?php echo $producto->numero_cama; ?></option>
                <option value="Urgencias">Urgencias</option>
                <option value="Cama 1">Cama 1</option>
                <option value="Cama 2">Cama 2</option>
                <option value="Cama 3">Cama 3</option>
                <option value="Cama 4">Cama 4</option>
                <option value="Cama 5">Cama 5</option>
                <option value="Cama 6">Cama 6</option>
                <option value="Cama 7">Cama 7</option>
                <option value="Cama 8">Cama 8</option>
                <option value="Cama 9">Cama 9</option>
                <option value="Cama 10">Cama 10</option>
                <option value="Incubadora">Incubadora</option>
                <option value="Ambulatorio 1">Ambulatorio 1</option>
                <option value="Ambulatorio 2">Ambulatorio 2</option>
                <option value="Ambulatorio 3">Ambulatorio 3</option>
      </select>

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
