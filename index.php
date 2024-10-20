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
  .offcanvas-footer {
    padding-top: 20px;
    padding-bottom: 20px;
  }
  .contenedorProducto{
    border: 2px solid rgb(0 71 141);
    padding: 2px;
    border-radius: 5px;
    background-color: rgb(150 232 255 / 20%);
  }
  .contenedorEliminar{
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .botonOffCanvas {
    position: fixed !important;
    bottom: 20px !important; 
    right: 20px !important; 
    background-color: rgb(2 69 211 / 28%) !important;
    color: black !important;
    border: 2px solid rgb(13 37 145 / 76%) !important;
    border-radius: 100px !important;
    padding: 17px !important;
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
      <a class="navbar-brand" href="#">CoopArtesanos</a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item mx-2">
            <a class="nav-link" href="./seccionManillas.php">Manillas</a>
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
     
      <!-- Producto 1 -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./ollaBarro.png" class="card-img-top" alt="Juguete 1" style="height: 300px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Olla de cerámica</h5>
            <p class="card-text">Olla de cerámica echa completamente a mano.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=ollaCeramica">Ver mas</a>
          </div>
        </div>
      </div>

      <!-- Producto 2 -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./platoBarro.png" class="card-img-top" alt="Juguete 2" style="height: 300px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Plato de cerámica</h5>
            <p class="card-text">Plato de cerámica hecho completamente a mano.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=platoCeramica">Ver mas</a>
          </div>
        </div>
      </div>

      <!-- Repite el código de la tarjeta para cada producto -->
      <!-- Producto 3 al 20 -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./vasijaBarro.png" class="card-img-top" alt="Juguete 3" style="height: 300px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Vasija de cerámica</h5>
            <p class="card-text">Vasija de cerámica echo completamente a manos.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=vasijaCeramica">Ver mas</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./atrapasuenosMadera.png" class="card-img-top" alt="Juguete 4" style="height: 300px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Atrapa sueños de madera</h5>
            <p class="card-text">Atrapa sueños de madera.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=atrapaSuenosMadera">Ver mas</a>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="./atrapasuenosTela.png" class="card-img-top" alt="Juguete 5" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title">Atrapa sueños de tela</h5>
            <p class="card-text">Atrapa sueños de tela fabricado en Colombia.</p>
            <a class="btn btn-primary container-fluid" href="./paginaProductos.php?producto=atrapaSuenosTela">Ver mas</a>
          </div>
        </div>
      </div>
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