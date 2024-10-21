<?php
  session_start();
  include './dbConnection.php';
  if (isset($_REQUEST['producto'])) {
    $producto = $_REQUEST['producto'];
    $ip_usuario = $_SERVER['REMOTE_ADDR'];
    $sql = "SELECT COUNT(id) AS cantidadVistas FROM vistas_productos WHERE producto='$producto' AND ip_usuario = '$ip_usuario'";
    $resultado = $conn->query($sql)->fetch_object();
    
    if ($resultado->cantidadVistas == 0) {
      $conn->query("INSERT INTO vistas_productos(ip_usuario, producto) VALUES ('$ip_usuario', '$producto')");
    }
    $cantidadVistas = $conn->query("SELECT COUNT(id) AS cantidadVisitas FROM vistas_productos WHERE producto='$producto'")->fetch_object()->cantidadVisitas;
    switch ($producto) {
      case 'ollaCeramica':
        $titulo = 'OLLA DE CERÁMICA';
        $descripcion = 'Una olla de barro es un recipiente tradicional hecho de arcilla cocida, utilizado para cocinar a fuego lento. Su material natural retiene y distribuye el calor de manera uniforme, lo que realza los sabores de los alimentos. Ideal para guisos, sopas y platos tradicionales, conserva la humedad y los nutrientes de los ingredientes.';
        $precio = '$52.000';
        $unidades = '5';
        $imagen = './ollaBarro.png';
        break;
      case 'platoCeramica':
        $titulo = 'PLATO DE CERÁMICA';
        $descripcion = 'Un plato de cerámica es un utensilio de cocina elaborado a partir de arcilla cocida y esmaltada, conocido por su resistencia y acabado suave. Es utilizado comúnmente para servir alimentos, siendo duradero y fácil de limpiar. Los platos de cerámica pueden presentar diseños decorativos y ofrecen una presentación elegante en la mesa.';
        $precio = '$15.000';
        $unidades = '9';
        $imagen = './platoBarro.png';
        break;
      case 'vasijaCeramica':
        $titulo = 'VASIJA DE CERÁMICA';
        $descripcion = 'Una vasija de cerámica es un recipiente elaborado a partir de arcilla cocida y esmaltada, utilizado para almacenar líquidos o alimentos. Su diseño puede variar desde formas simples hasta decoraciones artísticas, y es apreciada tanto por su funcionalidad como por su valor estético. Las vasijas de cerámica son duraderas y resistentes, lo que las hace ideales para su uso en la cocina o como elemento decorativo.';
        $precio = '$20.000';
        $unidades = '2';
        $imagen = './vasijaBarro.png';
        break;
      case 'atrapaSuenosMadera':
        $titulo = 'ATRAPA SUEÑOS DE MADERA';
        $descripcion = 'Un atrapasueños de madera es un objeto artesanal compuesto por un aro de madera con una red tejida en su interior, decorado con plumas, cuentas y otros elementos. Originario de las culturas nativas americanas, se cree que filtra los sueños, atrapando las pesadillas en la red y dejando pasar los buenos sueños. Además de su simbolismo, los atrapasueños de madera son apreciados por su belleza y su toque decorativo natural.';
        $precio = '$5.000';
        $unidades = '50';
        $imagen = './atrapasuenosMadera.png';
        break;
      case 'atrapaSuenosTela':
        $titulo = 'ATRAPA SUEÑOS DE TELA';
        $descripcion = 'Un atrapasueños de tela es un objeto decorativo que consiste en un aro recubierto de tela, con una red de hilos que crea un diseño único en su interior. Decorado con cintas, cuentas y plumas, se considera un símbolo de protección y bienestar. Este tipo de atrapasueños es ideal para aportar un toque de color y creatividad a cualquier espacio, al mismo tiempo que se cree que filtra los sueños, atrapando las pesadillas y permitiendo que solo los sueños positivos lleguen al soñador.';
        $precio = '$10.000';
        $unidades = '27';
        $imagen = './atrapasuenosTela.png';
        break;
      case 'manillaAzul':
        $titulo = 'MANILLA PARA PAREJAS';
        $descripcion = 'Una manilla roja y blanca para parejas es un accesorio simbólico que representa la conexión y el compromiso entre dos personas. Generalmente hecha de hilos entrelazados en estos colores, la manilla puede ser utilizada como un símbolo de amor, amistad o lealtad. El rojo suele asociarse con la pasión y el amor, mientras que el blanco simboliza la pureza y la paz. Al usarla, las parejas afirman su vínculo especial, manteniendo presente el significado detrás de este simple pero significativo accesorio.';
        $precio = '$8.000';
        $unidades = '10';
        $imagen = './manillaRojoBlanca.png';
        break;
      case 'manillaMorada':
        $titulo = 'MANILLA VERDE CON MORADO';
        $descripcion = 'Una manilla de mostacilla es una pulsera elaborada con pequeñas cuentas de vidrio o plástico, conocidas como mostacillas, que se ensartan en un hilo o cordón. Estas manillas pueden presentar una variedad de colores, patrones y diseños, lo que las convierte en un accesorio personalizable y atractivo. A menudo utilizadas como símbolo de amistad o conexión, las manillas de mostacilla son populares en la joyería artesanal y se pueden llevar solas o en combinaciones para crear un estilo único.';
        $precio = '$2.500';
        $unidades = '12';
        $imagen = './manillaMostacilla.png';
        break;
    }
  }
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
  img{
    height: 100%;
    object-fit: cover;
    width: 100%;
    height: 600px;
    object-fit: cover;
    border: 2px solid rgb(33, 152, 198);
    border-radius: 5px;
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
  <?php
    if(!isset($producto)){
  ?>
  <div class="alert alert-danger m-5" role="alert">
    No se encontro ningun producto
  </div>
  <?php
      exit;
    }
  ?>
  <div class="container mt-5">
    <div class="row">
      <div class='col-12 col-md-6'>
        <img src="<?php echo($imagen) ?>" alt="" style="height: 600px; object-fit: cover;">
      </div>
      <div class='col-12 col-md-6 d-flex flex-column'>
        <div class="container-fluid contenedorInfo flex-grow-1">
          <h3 class='fw-bold mb-5'><?php echo($titulo) ?></h3>
          <h4>Descripcion:</h4><p class="my-4"><?php echo($descripcion) ?></p>
          <h5>Unidades disponibles: <?php echo($unidades) ?></h5>
        </div>
        <div class="container-fluid contenedorBotones">
          <div class="row">
            <div class="col-6"><h4>Precio: <?php echo($precio) ?></h4></div>
            <div class="col-6"><h4 class='text-end'>Visitas: <?php echo($cantidadVistas ?? 0) ?></h4></div>
          </div>
          <?php 
            if(isset($_SESSION['logueado']) && $_SESSION['logueado']){
          ?>
            <button type='button' class='btn btn-sm btn-primary w-100' id='agregarCarrito' data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Anadir al carrito</button>
          <?php     
            }else{
          ?>
            <button type='button' class='btn btn-sm btn-primary w-100' data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top" disabled>Anadir al carrito</button>
          <?php 
            }
          ?>
          <button type='button' class='btn btn-sm btn-success w-100 mt-2' data-bs-toggle="modal" data-bs-target="#exampleModal">Contactar al vendedor</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Habla con el vendedor</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="email" class="form-control" id="name" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
              <label for="txt" class="form-label">Duda o inquietud</label>
              <input type="text" class="form-control" id="txt" placeholder="Déjanos un mensaje" required> 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="contactar">Enviar</button>
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
  <script>
    <?php 
      if(isset($_SESSION['logueado']) && $_SESSION['logueado']){
    ?>
      document.getElementById('contactar').addEventListener('click', function () {
        const name = document.getElementById('name').value;
        const txt = document.getElementById('txt').value;
        const message = `Hola mi nombre es ${name}.\nMe comunico por el producto <?php echo($titulo) ?> y necesito charlar sobre: ${txt}`;

        const encodedMessage = encodeURIComponent(message);

        const whatsappUrl = `https://api.whatsapp.com/send?phone=573236877823&text=${encodedMessage}`;

        window.open(whatsappUrl, '_blank');
      });
      document.getElementById('agregarCarrito').addEventListener('click', function () {
        if(!arrayGuardado){
          arrayGuardado = [];
        }
        arrayGuardado.push({
          nombre: '<?php echo$titulo ?>',
          precio: '<?php echo$precio ?>',
        });
        localStorage.setItem('carrito', JSON.stringify(arrayGuardado));
        renderizarCarritos(arrayGuardado);
      });
    <?php     
      }
    ?>
  </script>
</body>
</html>