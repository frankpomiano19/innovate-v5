<?php 
//#############################################################################################################################//
if(isset($_SESSION['user_email']) && isset($_SESSION['user_login_status']) && isset($_SESSION['plataforma_access']) && $_SESSION['plataforma_access'] == 1) {
//#############################################################################################################################//
    require_once("config/class.php");
    $user_id    = $_SESSION['id_user']; 
    $tra        = new Login;
?>
<!DOCTYPE html>
<html lang="es">
<!-- head -->
    <head>
        <?php 
            include "config/head.php";
        ?>
    </head>
<!-- fin head -->
<body class="" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":true, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}' >

<!-- Preloader -->
<?php 
    include "config/loader.php";
?>    
<!-- /Preloader -->

<!-- Begin page -->
<div class="wrapper">
<!-- ========== Left Sidebar Start ========== -->
<?php 
    include "config/main-header.php";
?>         
<!-- Left Sidebar End -->

<!-- ============================================================== -->

<!-- Start Page Content here -->

<!-- ============================================================== -->
<div class="content-page">
    <div class="content">

        <!-- Topbar Start -->
        <?php 
            include "config/main-sidebar.php";
         ?>          
        <!-- end Topbar -->


<!-- Start Content-->
<div class="container-fluid">                        
<!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                    </ol>
                </div>
                    <h4 class="page-title">
                        <i class="mdi mdi-home"></i>
                        INICIO
                    </h4>
            </div>
        </div>
    </div>     
<!-- end page title --> 
                        
    </div> <!-- container -->
</div> <!-- content -->

<!-- contenido del footer -->
<?php 
    include "config/footer.php";
?>
<!-- fin del contenido -->

    </div>
</div>
<!-- END wrapper -->

<!-- js -->
<?php 
    include "config/js.php";
?>   
<!-- verifica si cuenta esta verificada-->
<?php 
    //$reg  = $tra->UsuariosNoverificados();
?>
<!-- fin verifica si cuenta esta verificada-->
    </body>
</html>
<?php 
} else { 
    header("location: ../403.html");//sino, mandalo al login
    exit;
}      
?>   
