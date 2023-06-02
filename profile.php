<?php

require_once("config/class.php"); 

if(isset($_SESSION['user_email']) && isset($_SESSION['user_login_status'])) {
    if ($_SESSION['user_email'] != "" && $_SESSION['user_login_status'] == 1) {
      //##################################################################//
        $tra            = new Login();
        $user_id        = $_SESSION['id_user'];
        $nombre         = $_SESSION['firstname'];
        $imagen_perfil  = $_SESSION['img_perfil'];
        include('view/perfil_user.php');//enviar al panel del sistema
      //##################################################################//
    }else{
      header("location: 403.html");//sino, mandalo al login
    } 
   
} else { 
  header("location: 404.html");//sino, mandalo al login
}

?>