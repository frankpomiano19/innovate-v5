<?php

require_once("config/class.php"); 

if(isset($_GET['email']) && !empty($_GET['email']) and isset($_GET['hash']) && !empty($_GET['hash'])) {
    // if ($_SESSION['user_email'] != "" && $_SESSION['user_login_status'] == 1) {
    //   //##################################################################//
    //     $tra            = new Login();
    //     $user_id        = $_SESSION['id_user'];
    //     $nombre         = $_SESSION['firstname'];
    //     $imagen_perfil  = $_SESSION['img_perfil'];
    //     include('view/proyects.php');//enviar al panel del sistema
    //   //##################################################################//
    // }else{
    //   header("location: 403.html");//sino, mandalo al login
    // } 
    include('view/verify.php');
} else { 
  header("location: 404.html");//sino, mandalo al login
}
