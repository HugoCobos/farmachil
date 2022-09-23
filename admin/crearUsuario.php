<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Crear Usuario</title>
</head>
<body>
<?php
ini_set("display_errors","on"); error_reporting (E_ALL);
session_start();
if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'administrador') {
include './header.php';
include 'lateral.php';
include "../conexion.php";
$conexion = conecta_mysql();
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$username = $_POST['usuario']; 
$contraseña = $_POST['password'];
$nivel = $_POST['nivel'];

$buscar_usuario = "SELECT * FROM `usuarios` WHERE `username` = '$username'";
$result = $conexion->query($buscar_usuario);
$count = mysqli_num_rows($result);
    echo '<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
      </div>
    </div>';
    if($count==1){
        echo "<center> <h2>EL USUARIO YA EXISTE...!</h2><br/>";
        echo "<h3>"."Regresar a la pagina "."<br /> <br /><a href='./crearUsuario.php'><button type='submit' 
              class='btn btn-outline-danger'>Regresar</button></a>"."</h3></center>";
    }else{

        $query = "INSERT INTO `usuarios` ('id', `nombre`, `apellidos`, `username`, `password`, `nivel`)
        VALUES(null,'$nombres','$apellidos', '$username', '$contraseña', '$nivel')";
        
        if($conexion->query($query)===TRUE){
            echo "<center><br/>"."<h2>"."USUARIO CREADO EXITOSAMENTE!"."</h2>";
            echo "<h4>"."Usuario: ".$_POST['usuario']."</h4>";
            echo "<h5>"."Regresar a la pagina "."<a href='./usuarios.php'><button class='btn btn-success'>INICIO</button></a>"."</h5></center>";
        }else{
            echo "Error al crear el usuario".$query."<br>".$conexion->error;
        }
    }

echo '</main>
    </div>
</div>';
?>

<?php
} else {
    ?>
    <center>
    <h1>No tienes permiso para esta vista</h1><br>
    <a href="../index.html"><button class="btn btn-danger">Regresar</button></a>
    </center>
    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
      <script src="dashboard.js"></script></body>
    </html>
    
    
    </body>
    </html>