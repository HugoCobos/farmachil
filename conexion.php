<?php
function conecta_mysql() { 
		$servidor = 'localhost';
		$usuario = 'root';
		$contraseña = '';
		$bd = 'farmacia';
		$conexion = new mysqli($servidor,$usuario,$contraseña,$bd);
		if ($conexion -> connect_errno) {
		echo "Falló la conexion con la base de datos: " . $conexion -> connect_error;
		exit();
	}
	
	return $conexion;
	
    }
?>    
