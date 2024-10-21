<?php 
session_start();
include './dbConnection.php';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  if (isset($_POST['nombreUsu']) && isset($_POST['correoUsu']) && isset($_POST['contrasenaUsu']) && isset($_POST['confContasena'])) {
    $nombreUsuario = $conn->real_escape_string($_POST['nombreUsu']);
    $email = $conn->real_escape_string($_POST['correoUsu']);
    $sql = "SELECT id FROM usuarios WHERE correo_electronico = '$email'";
    $resultado = $conn->query($sql);
    if ($resultado->num_rows == 0) {
      $contrasena = $conn->real_escape_string($_POST['contrasenaUsu']);
      $confContrasena = $conn->real_escape_string($_POST['confContasena']);
      if ($contrasena == $confContrasena) {
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios(nombre_usuario, correo_electronico, contrasena) VALUES ('$nombreUsuario', '$email', '$contrasena')";
        if($conn->query($sql)){
          $_SESSION['logueado'] = true;
          $_SESSION['usuario'] = $nombreUsuario;
          header('Location: index.php');
          exit;
        }else{
          $_SESSION["registerFailded"] = "Ocurrio un error al crear el usuario, intentelo nuevamente";
        }
      }else{
        $_SESSION["registerFailded"] = "Las contraseñas no coinciden";
      }
    }else{
      $_SESSION["registerFailded"] = "Ya existe un usuario con este correo electronico";
    }
  }else{
    $_SESSION["registerFailded"] = "Todos los campos son obligatorios";
  }
}elseif (isset($_SESSION["logueado"])) {
  header('Location: index.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <title>Registro</title>
</head>
<body>
  <style>
    .position-fixed {
        top: 10px; /* Ajusta la distancia del borde superior */
        left: 10px; /* Ajusta la distancia del borde izquierdo */
    }
  </style>
  <main>
    <div class="container-fluid contenedorPrincipal">
      <div class="row">
        <div class="col-6 d-none d-md-block contenedorImagen"></div>
        <div class="col-12 col-md-6 contenedorFormulario p-5">
          <h2 class="text-center text-primary fw-bold">Registro de usuario</h2>
          <div class="card m-5">
            <div class="card-body">
              <form action="registro.php" method="POST">
                <label class='ms-1 fw-bold pb-2' for="nombreUsu">Nombre de usuario:</label>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" placeholder="Steven0987" required>
                  <label for="floatingInput">Nombre de usuario</label>
                </div>
                <label class='ms-1 fw-bold pb-2' for="correoUsu">Correo electronico:</label>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="correoUsu" name="correoUsu" placeholder="nombre@ejemplo.com" required>
                  <label for="floatingInput">Correo electronico</label>
                </div>
                <label class='ms-1 fw-bold pb-2' for="contrasenaUsu">Contraseña:</label>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="contrasenaUsu" name="contrasenaUsu" placeholder="Contraseña" required>
                  <label for="floatingPassword">Contraseña</label>
                </div>
                <label class='ms-1 fw-bold pb-2' for="confContasena">Confirmar contraseña:</label>
                <div class="form-floating">
                  <input type="password" class="form-control" id="confContasena" name="confContasena" placeholder="Confirmar contraseña" required>
                  <label for="floatingPassword">Confirmar contraseña</label>
                </div>
                <button class="btn btn-success container-fluid mt-3">Registrarse</button>
                <p class="mt-2 mb-1 text-center">¿Ya tiene una cuenta? <a href="./login.php" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Inicie sesion</a></p>
                <!--<p class="mt-2 mb-1 text-center">¿No tiene una cuenta? <a href="#" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Registrese</a></p>-->
              </form>
            </div>
          </div>
          <?php
            if (isset($_SESSION["registerFailded"])) {
          ?>
            <div class="alert alert-danger mt-3">
            <?php echo$_SESSION["registerFailded"] ?>
            </div>
          <?php
            unset($_SESSION["registerFailded"]);
            }
          ?>
        </div>
      </div>
    </div>
  </main>
  <a class="btn btn-sm btn-primary position-fixed" href="./index.php"><- Inicio</a>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>