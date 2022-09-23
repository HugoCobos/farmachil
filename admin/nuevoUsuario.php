<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Nuevo Usuario</title>
</head>
<body>
<?php
    session_start();
if ($_SESSION['username'] != '' && $_SESSION['nivel'] == 'administrador') {
include 'header.php';
include 'lateral.php';
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
    </div>
  </div>
</div>

<h2>Crear Usuario</h2>
<form action="./crearUsuario.php" method="POST">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nombres</label>
      <input type="text" name="nombres" class="form-control" id="inputEmail4" maxlength="50" autofocus required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellidos</label>
      <input type="text" name="apellidos" class="form-control" id="inputPassword4" maxlength="50" required>
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-6">
    <label for="inputAddress">Usuario</label>
    <input type="text" name="usuario" class="form-control" id="inputAddress" maxlength="30" required>
  </div>
  <div class="form-group col-md-6">
    <label for="inputAddress2">Contraseña</label>
    <input type="password" name="password" class="form-control" id="inputAddress2" maxlength="10" required>
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Nivel</label>
      <select id="inputState" class="form-control" name="nivel" required>
        <option selected>Elegir...</option>
        <option value="administrador">Administrador</option>
        <option value="farmacia">Farmacia</option>
        <option value="medico">Medico</option>
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-outline-success">Crear Usuario</button>
  <a class="btn btn-outline-danger" href="./usuarios.php">Cancelar</a>
</form>
</main>
</div>
</div>
<?php
}else {
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