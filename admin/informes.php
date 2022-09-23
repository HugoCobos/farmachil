<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes</title>
</head>
<body>
<?php
session_start();
if ( $_SESSION['nivel'] == 'administrador') {
include 'header.php';
include 'lateral.php';

?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					</div>
                </div>
</div><center>
                <br>
            <a class="btn btn-primary" href="./informeSemanal.php">Informe Semanal <i class="fas fa-bars"></i></a>
            <a class="btn btn-primary" href="./informeMensual.php">Informe Mensual <i class="fas fa-bars"></i></a>
        </center>


<?php
}else {
    echo 'Favor de iniciar sesion <br /> 
		  <a href="./index.html"><button class="btn btn-danger">Regresar</button></a>';
}
?>
</body>
</html>