<?php
session_start();
include 'encabezado.php';
include 'lateral.php';
Actualizar_paciente($_GET['paciente']);

function Actualizar_paciente($nombre){
    include "./conexion.php";
    $conexion = conecta_mysql();
    $actualizar = "UPDATE `paciente` SET `status` = '0' WHERE `paciente`.`nombre` = '".$nombre."' ";

$conexion->query($actualizar) or die ("Error al enviar los datos".mysqli_error($conexion));
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
        </div>
            <h4>Actualizacion Exitosa!</h4>
            <?php header("Location: registrar_paciente.php");?>
        </div>
</main>
    <?php
}
?>