<?php
session_start();
include 'header.php';
include 'lateral.php';
Actualizar_usuario($_POST['nombre'],$_POST['apellidos'],$_POST['username'],$_POST['password'],$_POST['nivel']);

function Actualizar_usuario($nombre,$apellidos,$username,$password,$nivel){
    include "../conexion.php";
    $conexion = conecta_mysql();
    $nivel = strtolower($nivel);
    $actualizar = "UPDATE `usuarios` SET `nombre` = '".$nombre."' , `apellidos` = '".$apellidos."' , 
     `password` = '".$password."' , `nivel` = '".$nivel."' WHERE `usuarios`.`username` = '".$username."' ";

// $conexion->query($actualizar) or die ("Error al enviar los datos".mysqli_error($conexion));
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
        </div>
        <?php
        if ($actualizar === TRUE) {
            ?>
            <h4>Actualizacion Exitosa!</h4>
            <a href="./usuarios.php"><button type"submit" name="volver" class="btn btn-outline-danger">Volver</button></a>
            <?php
        }else{?>
            <h4>Hubo un error! <br> <?php echo $conexion->query($actualizar) or die ("Error al enviar los datos".mysqli_error($conexion) .' <br /><a href="./usuarios.php"><button type"submit" name="volver" class="btn btn-outline-danger">Volver</button></a>'); ?></h4>
            
            <?php
        }
            ?>
        </div>
</main>
    <?php
}
?>