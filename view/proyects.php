
<!DOCTYPE html>
<html lang="es">
<!-- head -->
    <head>
        <?php 
            include("config/head.php");
        ?>
        <link media="all" type="text/css" rel="stylesheet" href="assets/css/other_personalizado.css">
        <!-- include summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    </head>
<!-- fin head -->
<body class="" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":true, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}' >

<!-- Preloader -->
<?php 
    include("config/loader.php");
?>    
<!-- /Preloader -->

<!-- Begin page -->
<div class="wrapper">
<!-- ========== Left Sidebar Start fffff========== -->
<?php 
    include("config/main-header.php");
?>         
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->
<div class="content-page">
    <div class="content">
        <!-- Topbar Start -->
        <?php 
            include("config/main-sidebar.php");
         ?>          
        <!-- end Topbar -->

<!-- modales -->
<?php 
    //include("modal/cambiar_clave_plataforma.php");
?>
<!-- fin modales -->

<!-- Start Content-->
<div class="container-fluid">                        
<!-- FORMULARIO CON DATOS DEL USUARIO -->
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Proyectos</li>
                </ol>
            </div>
            <!-- -->
            <h4 class="page-title">
                <i class="mdi mdi-clipboard-check-multiple"></i>
                PROYECTOS
            </h4>
        </div>
    </div>
</div> 
<!-- end page title -->    
<!-- row migajas y button agregar proyecto-->
<div class="row">
    <div class="d-flex">
        <!-- -->
         <a href="#" data-toggle="modal" data-target="#addProyect" data-backdrop="static" data-keyboard="false" class="btn btn-success mb-2 mb-3" style="border-radius: 20px !important;">
            <i class="mdi mdi-plus"></i> 
            Agregar
        </a>
        <!-- -->
    </div>
</div>
<!-- end --> 

<!-- CARDS DE PROYECTOS -->
<div class="row">  
    <!-- loading -->
    <div class="col-md-12 text-center" id="loader" style="margin-top: 50px;">
        <span role="status" class="mr-1 mb-2 spinner-border text-success" style="width: 3rem;height: 3rem;">
            <span class="sr-only"></span>
        </span>
        <!-- -->
        <div class="text-center">
            <b class="mt-0">Cargando</b><br>
            <small>Espere un momento...</small>
        </div>
    </div> 
    <!-- fin loading  -->

    <!-- CARGAMOS LA DATA - LIST PROYECTOS -->
        <div class='data_div'></div>
    <!-- FIN CARGA DE DATA -->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div><!-- row principal -->


<!-- modales -->
<?php 
    include("modal/add_proyect.php");
?>
<!-- fin modales -->

</div> <!-- content -->

<!-- contenido del footer -->
<?php 
    include("config/footer.php");
?>
<!-- fin del contenido -->

    </div>
</div>
<!-- END wrapper -->

<!-- js -->
<?php 
    include("config/js.php");
?>     
<script src="assets/js/validation.min.js"></script>   
<script type="text/javascript" src="view/proyects/index.js"></script>
<!-- include summernote js -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
            $('#txtdescrip').summernote({

                lang: 'es-ES', // default: 'en-US'
                focus: true,
                disableResize: true,            // Does not work
                disableResizeEditor: true,      // Does not work either
                resize: false,

              toolbar: [
                ['style', ['bold', 'italic', 'underline']],
                ['fontsize', ['fontsize']],
              ],height: 100,
            });
    });
</script>

    </body>
</html>
