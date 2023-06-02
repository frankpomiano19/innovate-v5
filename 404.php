<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- head -->
        <?php 
            include("config/head.php");
        ?>
        <!-- fin head -->
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
            <div class="content-page" style="margin-left: 0px !important;padding: 100px 12px 65px !important;">
                <div class="content">
                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <img src="assets/img/file-searching.svg" height="90" alt="File not found Image">

                                    <h1 class="text-error mt-4">404</h1>
                                    <h4 class="text-uppercase text-danger mt-3">Página No Encontrada</h4>
                                    <p class="text-muted mt-3">
                                        Parece que te has equivocado de camino. No te preocupes... nos pasa a los mejores.
                                    </p>

                                    <a class="btn btn-danger mt-3" href="index.php">
                                        <i class="mdi mdi-reply"></i> Regresar
                                    </a>
                                </div> <!-- end /.text-center-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
            </div>
        </div>
        <!-- END wrapper -->

<!-- js -->
<?php 
    include("config/js.php");
?>       
    </body>
</html>
