<?php
  session_start(); 
?>
<style>
  .tabLogin{
    display: flex;
    border: 2px solid rgb(2 171 207 / 92%);
    background-color: rgb(151 211 253 / 18%);
    font-weight: bold;
    border-radius: 13px;
    align-items: center;
    transition: 2s ease;
  }
  .tabLogin:hover{
    transform: scale(.94);
  }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>CoopArtesanos</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="./index.php">CoopArtesanos</a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item mx-2">
            <a class="nav-link active" aria-current="page" href="./seccionManillas.php">Manillas</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="./seccionCeramicas.php">Ceramicas</a>
          </li>
          <li class="nav-item mx-2">
            <a class="nav-link" href="./seccionAtrapaSuenos.php">Atrapa sueños</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Nosotros
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./mision.php">Mision</a></li>
              <li><a class="dropdown-item" href="./somos.php">Que es CoopArtesanos</a></li>
              <li><a class="dropdown-item" href="./nuestroModelo.php">Ventajas de nuestro modelo</a></li>
            </ul>
          </li>
          <?php
            if (!isset($_SESSION['logueado']) || !$_SESSION['logueado']) {
          ?>
            <li class="nav-item tabLogin px-2">
                <a class="nav-link p-0" href="./login.php">Iniciar sesion</a>
            </li>
          <?php
            }else{
          ?>
            <li class="nav-item tabLogin px-2">
                <a class="nav-link p-0" href="./logout.php">Cerrar sesion</a>
            </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./manillaRojoBlanca.png" class="card-img-top" alt="Juguete 6" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Manilla para parejas</h5>
            <p class="card-text">Manillas perfectas para combinar en pareja.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=manillaAzul">Ver mas</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./manillaMostacilla.png" class="card-img-top" alt="Juguete 7" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Manilla verde con morado</h5>
            <p class="card-text">Manilla hecha con mostacilla.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=manillaMorada">Ver mas</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php 
    if(isset($_SESSION['logueado']) && $_SESSION['logueado']){
      include './carritoCompras.php';
    }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>