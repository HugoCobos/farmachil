<?php
session_start();
if ($_SESSION['username'] != '') {
    include_once "encabezado.php";
    include_once "lateral.php";
    include_once "conexion_clinica.php";
	$conexion = conecta_mysqlF();
	$sentencia = "SELECT * FROM `camas` WHERE `disponibilidad` = 'si'";
	$resultado2 = $conexion->query($sentencia);
?>
    <body>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                    </div>
                </div>
            </div>
	<!--  -->
			<div class="container">
				<!-- Formulario -->
				<h1>Registrar Paciente</h1><br>
				<div class="row">
					<div class="col-8">
					<form method="post" action="./registrar_paciente.php" autocomplete="off">
							<label for="nombre_paciente">Nombre</label>
							<input class="form-control" name="nombre_paciente" required id="nombre_paciente" type="text" placeholder="Nombre">
							<label for="apellido_paciente">Apellidos</label>
							<input class="form-control" name="apellido_paciente" required type="text" id="apellido_paciente" placeholder="Apellidos">
							<label for="telefono">telefono</label>
							<input class="form-control" name="telefono" type="number" id="telefono" placeholder="2878814083">
							<label for="correo">Edad</label>
							<input class="form-control" name="edad" type="number" id="edad" placeholder="25">
							<label> Camas disponibles</label><br>
							<select name="cama" id="cama" class="form-control">
								<option value="0">No requiere</option>
								<?php
								while ($objeto = $resultado2->fetch_object()) {
									echo "<option value='$objeto->id_cama'>$objeto->nombre_cama</option>";
								}
								?>
							</select>
							<label>Anticipo</label><br>
							<input type="number" class="form-control" name="abono" id="abono"><br>
							<input class="btn btn-info" type="submit" value="Guardar">
						</form>
					</div>

				</div>
<?php
    include_once "pie.php";
} else {
    echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>