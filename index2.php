<?php
session_start();
if ($_SESSION['username'] != '') {
header("Location: vender.php");
}else{
    echo 'Favor de iniciar sesion <br /> 
	<a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>