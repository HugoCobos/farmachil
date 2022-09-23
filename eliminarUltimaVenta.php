<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<?php
// ini_set("display_errors","on"); error_reporting (E_ALL);
include './encabezado.php';
include './lateral.php';

if(!isset($_GET["id"])) exit();
$id = $_GET["id"];

if(isset($_POST["eliminar"])){
    include_once "base_de_datos.php";
    include './conexion.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $conexion = conecta_mysql();
    
    $buscarUsuario = "SELECT * FROM `usuarios` WHERE `username` = '$username' 
                        AND `password` = '$password' AND `nivel` = 'administrador'";
    $result = $conexion->query($buscarUsuario);
    $count = mysqli_num_rows($result);

  if ($count == 1){

    $sentencia = $base_de_datos->prepare("DELETE FROM ventas WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
    if($resultado === TRUE){
        header("Location: ./ventas.php");
        exit;
    }
    else echo "<center>Algo salió mal</center>";
    }else{
        echo "<center>Usuario o contraseña incorrecta, Favor de intentarlo de nuevo</center>";
    }
}
    ?>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
<div class="container">
    <center>
        <h1>Permisos del Administrador</h1>
       <form action="" method="POST">
             <label for="admin">Usuario</label>
             <input type="text" name="username" id="username" required>
             <label for="admin">Contraseña</label>
             <input type="password" name="password" id="password" required>
             <input type="submit" value="Eliminar" name="eliminar" class="btn btn-danger">
       </form> 
    </center>
    </div>
</body>
</html>