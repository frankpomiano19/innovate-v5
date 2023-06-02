<?php
session_start();
// Inicializa la sesión

// Destruye todas las variables de la sesión
$_SESSION = array();
 
//guardar el nombre de la sessión para luego borrar las cookies
$session_name = session_name();
 
//Para destruir una variable en específico
unset($_SESSION['user_name']);
unset($_SESSION['user_password_hash']); 
unset($_SESSION['user_login_status']);
// Finalmente, destruye la sesión
session_destroy();
// Para borrar las cookies asociadas a la sesión
// Es necesario hacer una petición http para que el navegador las elimine
if ( isset( $_COOKIE[ $session_name ] ) ) {
    if ( setcookie(session_name(), '', time()-3600, '/') ) {
		header("location: index.php");//sino, mandalo al login
        //exit();   
    }
}else{
    	header("location: index.php");//sino, mandalo al login
    }
?>