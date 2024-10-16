<?php
include './dbConnection.php';
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  if ($_POST['login']) {
    
  }elseif ($_POST['registro']) {
    if (isset($_POST['nombreUsu']) && isset($_POST['correoUsu']) && isset($_POST['contrasenaUsu']) && isset($_POST['confContasena'])) {
      $nombreUsuario = $conn->real_escape_string($_POST['nombreUsu']);
      $email = $conn->real_escape_string($_POST['correoUsu']);
      $contrasena = $conn->real_escape_string($_POST['contrasenaUsu']);
      $confContrasena = $conn->real_escape_string($_POST['confContasena']);
      if ($contrasena == $confContrasena) {
        $sql = "INSERT INTO usuarios(nombre_usuario, correo_electronico, contrasena) VALUES ('$nombreUsuario', '$email', '$contrasena')";
        if($conn->query($sql)){
          $_SESSION[''];
        }else{

        }
      }else{
        //TODO: Responder que las contrasenas no coinciden
      }
      
    }else{
      //TODO: Responder que todo es obligatorio
    }
  }
}