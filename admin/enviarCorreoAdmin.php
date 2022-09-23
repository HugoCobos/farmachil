<?php
session_start();
ini_set("display_errors","on"); error_reporting (E_ALL);
include '../conexion.php';
include "../phpmailer/class.phpmailer.php";
include "../phpmailer/class.smtp.php";
if($_SESSION['username'] != ''){
    if(!isset($_POST["asunto"]) || 
    !isset($_POST["pedido"]) || 
    !isset($_POST["proveedor"])) 
    exit();

    $asunto = $_POST['asunto'];
    $pedido = $_POST['pedido'];
    $id_proveedor = $_POST['proveedor'];
    $conexion = conecta_mysql();
    $sentencia = "SELECT * FROM proveedores WHERE `id` = $id_proveedor";
    $resultado = $conexion->query($sentencia) or die(mysql_error($conexion));
    $correo = $resultado->fetch_object();

    $email = $correo->correo;
    $nombre= $correo->nombre;
    $nombreProveedor = $correo->nombre;
            $phpmailer = new PHPMailer();

            // ---------- datos de la cuenta de Gmail -------------------------------
            $phpmailer->Username = 'medicacentraltux@gmail.com';
            $phpmailer->Password = 'Farmacia';
            //-----------------------------------------------------------------------
            
            //$phpmailer->SMTPDebug = 1;
            $phpmailer->SMTPSecure = 'tls';
            $phpmailer->Host = "smtp.gmail.com"; // GMail
            $phpmailer->Port = 587;
            $phpmailer->IsSMTP(); // use SMTP
            $phpmailer->SMTPAuth = true;
            $phpmailer->setFrom($email.$nombreProveedor);
            $phpmailer->AddAddress("$email"); // recipients email
            $phpmailer->IsHTML(true);
            $phpmailer->Subject = $asunto;	
            $phpmailer->Body .="<h3> Buen dia, estimado proveedor: $nombreProveedor </h3><br />";
            $phpmailer->Body .="<h2>$pedido</h2><br />";
            $phpmailer->Body .="<h3><strong><u>Nota: Si en caso de no tener en existencia o surge algun detalle favor contactarse con nosotros</u></strong></h3><br />";
            $phpmailer->Body .="<p>Agradeciendo su aténcion quedo en espera de su pronta respuesta</p>";
            $phpmailer->Body .="<hr>";
            $phpmailer->Body .="<footer>Direccion: 5 de mayo, San Juan Bautista, Tuxtepec. Tel: 2878814083</footer>";
            if($phpmailer->Send() === TRUE){
                $query = "INSERT INTO `pedidos` (`id`,`asunto`, `pedido`, `id_proveedor`, `proveedor`, `fecha`, `recibido`) 
                VALUES (NULL, '$asunto', '$pedido', '$id_proveedor', '$nombreProveedor', CURRENT_TIMESTAMP, 'no');";
                $result = $conexion -> query($query);
                if(!$result){
                    die(mysqli_error($conexion)."Query Failed");
                    if($_SESSION['nivel'] == "farmacia"){
                      header("Location: ./pedidos.php");
                    }else{
                      header("Location: ./admin/pedidos.php");
                    }
                }
                include 'header.php';
                include 'lateral.php';
            echo '
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                </div>
              </div>
            </div>
            <div class="container">
            <center><h4 class="text-center">Envio exitoso!</h4>';
              
              echo '<a href="./pedidosAdmin.php"><button type="submit" name="volver" class="btn btn-succeess">Volver</button></a></center></div>';
            
            }else{
              include 'header.php';
                include 'lateral.php';
                echo "
                <main role='main' class='col-md-9 ml-sm-auto col-lg-10 px-md-4'>
            <div class='d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom'>
              <div class='btn-toolbar mb-2 mb-md-0'>
                <div class='btn-group mr-2'>
                </div>
              </div>
            </div>
            <div class='container'>
                <center><h4 class='text-center'>Hubo un error en el envio de correo! <br />$phpmailer->ErrorInfo</h4>'";

                  echo "<a href='./pedidosAdmin.php'><button type='submit' name='volver' class='btn btn-danger'>Volver</button></a></center></div>";
            
          }
}else{
    echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>