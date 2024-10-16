<?php
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "Steven"; // Tu nombre de usuario
$password = "123"; // Tu contraseña
$dbname = "tienda_artesanal"; // El nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}