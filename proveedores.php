<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <title>Proveedores prueba</title>
</head>

<?php
session_start();
include 'encabezado.php';
include 'lateral.php';
?>
<body>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>

    <center>
    <div class="container p-4">
        
        <div class="col-md-6">

            <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombre</label>
      <input type="text" class="form-control" id="inputEmail4">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Telefono</label>
      <input type="password" class="form-control" id="inputPassword4">
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Correo</label>
    <input type="email" class="form-control" id="inputAddress" placeholder="ejemplo@...">
  </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

    </div>
</div>
    </center>
</body>
<?php
include 'providers/footer.php';
?>
</html>
