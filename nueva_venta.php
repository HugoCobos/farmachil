<?php
    include('conexion.php');
    $query = "INSERT INTO `ventas` (`folio`, `fecha`, `usuario_id`, `num_cama`) VALUES (NULL, CURRENT_TIMESTAMP, '', '');";
    $result = $conexion -> query($query);
    header("Location: index.php");

?>

