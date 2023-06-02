<?php

require_once('config/load.php');

$login = new Login();
  if ($login->isUserLoggedIn() == true) 
  { 
    $user_id = $_SESSION['id_user'];
    include('view/panel.php');//enviar al panel del sistema
  }
  else
  {
    header("location: login.php");//sino, mandalo al login
    exit;   
  }
?>