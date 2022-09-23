<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<?php
ini_set("display_errors","on"); error_reporting (E_ALL);
include 'header.php';

$id = $_GET["id"];
    include_once "../base_de_datos.php";
    include '../conexion.php';

    $sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
    if($resultado === TRUE){
        header("Location: ./ventas_camaAdmin.php");
        exit;
    }
else{
    echo "<center>Algo salió mal</center>";
        echo "<center>Usuario o contraseña incorrecta, Favor de intentarlo de nuevo</center>";
    }
    ?>
</body>
</html>