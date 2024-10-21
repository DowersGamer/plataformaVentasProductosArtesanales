<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestra misión</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03"
                aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
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
                    } else {
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
    <div class="about">
        <div class="wrapper">
            <h2>Nuestra misión</h2>
            <p style="font-size: 22px;">
                En CoopArtesanos, nuestra misión es empoderar a los artesanos locales y fomentar la riqueza de
                sus habilidades y tradiciones. Creemos en el valor de lo hecho a mano y en la importancia de preservar
                la cultura artesanal. <br>
                Nuestro compromiso es crear un ecosistema donde la creatividad y la autenticidad se valoren y se
                respeten. Juntos, promovemos la sostenibilidad, la equidad y la apreciación por el trabajo manual,
                contribuyendo al desarrollo de comunidades prósperas y resilientes.
            </p>
        </div>
    </div>
</body>
<style>
    * {
        margin: 0;
        padding: 0;
    }

    .tabLogin {
        display: flex;
        border: 2px solid rgb(2 171 207 / 92%);
        background-color: rgb(151 211 253 / 18%);
        font-weight: bold;
        border-radius: 13px;
        align-items: center;
        transition: 2s ease;
    }

    .tabLogin:hover {
        transform: scale(.94);
    }

    .about {
        margin: 0;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        background: linear-gradient(45deg, #3494e6, #ec6ead, #3494e6, #ec6ead);
        background-size: 400% 400%;
        animation: animate 7s infinite alternate;
    }

    .wrapper {
        text-align: center;
        color: #fff;
    }

    .wrapper h2 {
        font-size: 5em;
        margin-bottom: 10px;
        font-family: "Bebas Neue", sans-serif;
    }

    .wrapper p {
        font-size: 1.2em;
        margin-bottom: 20px;
        font-family: "Montserrat", sans-serif;
        padding: 0 25px;
        line-height: 1.5;
    }

    .about-image {
        max-width: 250px;
        height: auto;
        border-radius: 50%;
        border: 15px groove #fff;
    }

    @keyframes animate {
        0% {
            background-position: 0% 50%;
        }

        100% {
            background-position: 100% 50%;
        }
    }

    @media (min-width: 768px) {
        .wrapper {
            max-width: 600px;
        }
    }

    @media (min-width: 992px) {
        .wrapper {
            max-width: 800px;
        }
    }
</style>

</html>