<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST["cerrar_sesion"])) {
    unset($_SESSION['logueado']);
    session_destroy();
    session_abort();
    session_unset();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="login.php">Login</a>
    <form action="index.php" method="POST">
        <button value="cerrar_sesion" name="cerrar_sesion">Cerrar sesion</button>
    </form>
</body>
</html>