<?php 
session_start();
if (isset($_SESSION['logueado'])) {
  unset($_SESSION['logueado']);
}
session_destroy();
session_abort();
session_unset();
header('Location: ./index.php');