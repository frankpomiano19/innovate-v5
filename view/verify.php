<?php

require_once "config/class.php";
include("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<!-- head -->

<head>
    <link media="all" type="text/css" rel="stylesheet" href="assets/css/other_personalizado.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<!-- fin head -->

<body class="" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":true, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <?php
    $email = $_GET['email'];
    $pass = $_GET['hash'];
    $sql_verify = mysqli_query($con, "SELECT user_name, user_password_hash, verificado 
                                     FROM users WHERE user_name= '" . $email . "' 
                                     AND user_password_hash= '" . $pass . "' AND verificado=0");
    $count = mysqli_num_rows($sql_verify);
    if ($count > 0) {
        mysqli_query($con, "UPDATE users SET verificado='1' WHERE user_name= '" . $email . "' AND user_password_hash= '" . $pass . "' AND verificado=0");
        echo "Su cuenta ha sido activada, ahora puede iniciar sesión";
    } else {
        echo "La URL no es válida o ya ha activado su cuenta.";
    }
    ?>

</body>

</html>