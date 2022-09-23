<?php
session_start();
ini_set("display_errors","on"); error_reporting (E_ALL);
include 'conexion.php';
$conexion = conecta_mysql();
$username = $_POST['username'];
$password = $_POST['password'];

$consulta = "SELECT * FROM `usuarios` WHERE 
            `username` ='$username' and `password` = '$password'";
$result = $conexion->query($consulta);
if ($result->num_rows>0){ }
    $rows = ($result->fetch_array());
    
    if($username == $rows['username'] and $password == $rows['password']){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['nivel'] = $rows['nivel'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start']*(5*60);

    if($rows['nivel']=="administrador"){
        header("Location: ./admin/index.php?nombre=$username");
        
    }else if($rows['nivel']=="farmacia"){
        header("Location: ./index2.php?nombre=$username");

    }else if($rows['nivel']=="medico"){
        header("Location: ./doctores/index2.php?nombre=$username");

    }
    }else if($username !=$rows ['username']  || $password != $rows ['password']){
        ?>
        <link rel="stylesheet" href="./css/2.css">
        <center>
        <h1>Este usuario no existe o contraseña incorrecta</h1>
            <h5><a href='./index.html'><button class='btn btn-danger'>regresar</button></a></h5></center>
    <?php
    }elseif (empty($password)) {
        echo "<h2>Favor de ingresar contraseña</h2>";
        echo "<center>"."<h5>"."<a href='./index.html'><button class='btn btn-danger'>regresar</button></a>"."</h5>"."</center>";
    }
    mysqli_close($conexion);
?>