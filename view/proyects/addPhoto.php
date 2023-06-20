<?php
require_once "config/class.php";
//################################################################################################################################//
if (isset($_SESSION['user_email']) && isset($_SESSION['user_login_status']) && isset($_SESSION['plataforma_access']) && $_SESSION['plataforma_access'] == 1) {
    //############################################################################################################################//
    //require_once("config/class.php"); 
    include("config/conexion.php");
    //###########################################################################################################################//
    $user_id = $_SESSION['id_user'];
    //##########################################################################################################################//
    if (isset($_GET["imgStr"])) { //recepcionamos la variable que se envia por form
        $token   = $_GET["imgStr"];
        //###################################################################################################################//
        $sql_proyect    = mysqli_query($con, "select * from proyects where proyect_token_security='" . $token . "' and proyect_status > 0 and proyect_responsability_user='" . $user_id . "'");
        $count          = mysqli_num_rows($sql_proyect);
        //###################################################################################################################//
        if ($count == 1) {
            //##################### CONSULTA DE REGISTRO EN IMAGENES #####################################################//
            $sql_proyect_img    = mysqli_query($con, "select * from img_proyect where id_proyect='" . $token . "' and status_imagen=1");
            $count_img          = mysqli_num_rows($sql_proyect_img);
            $rw_proyect         = mysqli_fetch_array($sql_proyect);
            $name_proyecto      = $rw_proyect["proyect_name"];
            //##################### CONSULTA DE REGISTRO EN IMAGENES #####################################################//
            $sql_proyect_tif    = mysqli_query($con, "select * from tif_proyect where id_proyect='" . $token . "' and status_imagen=1");
            $count_tif          = mysqli_num_rows($sql_proyect_tif);

            //#################### CONDICIONAL SI HAY REGISTROS ENCONTRADOS #############################################//

?>

            <!DOCTYPE html>
            <html lang="es">
            <!-- head -->

            <head>
                <?php
                include("config/head.php");
                ?>
                <!-- iconos fileuploadr -->
                <link rel="stylesheet" href="assets/plugins/fontello/css/iconos.css" />
                <link rel="stylesheet" href="assets/plugins/fontello/css/iconos-codes.css" />
                <link rel="stylesheet" href="assets/plugins/fontello/css/iconos-embedded.css" />
                <?php
                include("config/config_map.php");
                ?>
                <!-- personalizado -->
                <link rel="stylesheet" href="assets/css/other_personalizado.css" />
            </head>
            <!-- fin head -->

            <body class="" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":true, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

                <!-- Preloader -->
                <?php
                include("config/loader.php");
                ?>
                <!-- fin Preloader -->
                <!-- Begin page -->
                <div class="wrapper">
                    <!-- ========== Left Sidebar Start fffff========== -->
                    <?php
                    include("config/main-header.php");
                    ?>
                    <!-- Left Sidebar End -->
                    <!-- modales -->
                    <?php
                    include("modal/comenzar_procesamiento.php");
                    ?>
                    <!-- fin modales -->
                    <!-- Load para proceso de subida de imagenes -->
                    <div id="loading-ajax" style="display:none;z-index: 99999;">

                    </div>
                    <!-- Fin Load para proceso de subida de imagenes -->
                    <!-- Load para proceso de subida de imagenes -->
                    <div id="loading-ajax-tif" style="display:none;z-index: 99999;">

                    </div>
                    <!-- Fin Load para proceso de subida de imagenes -->


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
                                                    <li class="breadcrumb-item active">Subir Imágenes</li>
                                                </ol>
                                            </div>
                                            <h4 class="page-title">
                                                <i class="mdi mdi-file-upload"></i>
                                                PROCESAMIENTO FOTOGAMÉTRICO
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <!-- end page title -->

                                <div class="row">
                                    <div class="col-12">
                                        <!-- card image process-->
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- tabs -->
                                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                                    <li class="nav-item">
                                                        <a href="#tab1" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                                            <span class="d-md-block" id="textTitle">
                                                                <!-- titulo dinamico -->
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <!-- -->
                                                    <!-- <li class="nav-item">
                                                        <a href="#tab3" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                                            <span class="d-md-block">
                                                                Información del Proyecto
                                                            </span>
                                                        </a>
                                                    </li> -->
                                                    <!-- -->
                                                    <li class="nav-item">
                                                        <a href="#tab2" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                                            <span class="d-md-block">
                                                                Resultados de Procesamiento
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- fin tabs -->

                                                <!-- cuerpo tabs -->
                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="tab1">
                                                        <!-- cuerpo del contenido tab1-->
                                                        <div class="text-sm-right">
                                                            <a href="proyects.php" class="btn btn-danger" style="border-radius: 30px !important;">
                                                                SALIR
                                                                <i class="dripicons-arrow-thin-right mr-1"></i>
                                                            </a>
                                                        </div>
                                                        <!-- -->
                                                        <div class="text-center">
                                                            <span>
                                                                Te encuentras en el proyecto - <b><?php echo $name_proyecto; ?></b>
                                                            </span>
                                                        </div>
                                                        <!-- -->
                                                        <hr>
                                                        <!-- DIV SUBIR IMÁGENES -->
                                                        <div id="uploadImg">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <input type="hidden" name="idProyect" id="idProyect" value="<?php echo $token; ?>">
                                                                </div>
                                                                <!-- -->
                                                                <div class="col-md-12" style="text-align: center;">
                                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                                        <a id="uploadFile" name="uploadFile" href="javascript:;" class="btn btn-success" style="margin-bottom: 10px;">
                                                                            <i class="mdi mdi-plus"></i>
                                                                            Cargar Archivos
                                                                        </a>
                                                                        <!-- -->
                                                                        <a id="upload" href="javascript:;" class="btn btn-danger" style="margin-bottom: 10px;display: none;">
                                                                            <i class="mdi mdi-file-upload-outline"></i>
                                                                            Subir Archivos
                                                                        </a>
                                                                        <!-- -->
                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                                <!-- -->

                                                                <div id="container">
                                                                    <!-- loading -->
                                                                    <div class="col-md-12 text-center" id="loaderPhoto" style="display: none;">
                                                                        <span id="loaderIcon" role="status" class="mr-1 mb-2 spinner-border text-success" style="width: 2rem;height: 2rem;margin-bottom: 10px;">
                                                                            <span class="sr-only"></span>
                                                                        </span>
                                                                        <!-- img confirma -->
                                                                        <div class="text-center">
                                                                            <img src="assets/img/iconos/ok.png" id="imgSuccess" width="54" height="54" style="margin-bottom: 10px;">
                                                                        </div>
                                                                        <!-- fin img confirma-->
                                                                        <div class="text-center">
                                                                            <b id="textResult" class="mt-0">Procesando...</b><br>
                                                                            <span id="porcentaje"></span>
                                                                        </div>
                                                                        <!-- enlace reload -->
                                                                        <div class="text-center" id="reload">
                                                                            <a href="#" onclick="refresh();" style="color: red;">
                                                                                <b>Cargar imágenes</b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <!-- fin loading  -->

                                                                    <!-- cabeceras para conteos -->
                                                                    <div class="table-responsive" id="etiquetas_imgs" style="display: none;">
                                                                        <table class="table table-sm table-centered mb-0 font-14">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th class="text-left" style="color: black;">
                                                                                        Archivos:
                                                                                        <span id="cantidad_archivos">0</span>
                                                                                    </th>
                                                                                    <th class="text-right" style="color: black;">
                                                                                        Peso Total:
                                                                                        <span id="peso_archivos">0</span>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                    <!-- fin de cabeceras -->

                                                                    <!-- listado de archivos subidos -->
                                                                    <div data-simplebar style="max-height: 400px;">
                                                                        <div id="filelist"></div>
                                                                    </div>
                                                                </div>

                                                                <!-- -->

                                                            </div> <!-- card body -->
                                                            <!-- DIV MOSTRAR IMAGENES -->
                                                            <div id="viewImg">
                                                                <!-- loader -->
                                                                <div id="loaderImg" class="text-center" style="display: none;">
                                                                    <span role="status" class="mr-1 spinner-border text-success" style="width: 2rem;height: 2rem;margin-bottom: 10px;">
                                                                        <span class="sr-only"></span>
                                                                    </span>
                                                                    <!-- -->
                                                                    <div id="textProcess">
                                                                        <span class="text-center" style="font-size: 12px;">Cargando...</span>
                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                                <!-- fin loader -->

                                                                <!-- CARGA DATA AJAX -->
                                                                <div id="resultData">

                                                                </div>
                                                                <!-- FIN DATA AJAX-->
                                                            </div>
                                                            <!-- -->
                                                        </div> <!-- end card-body -->
                                                        <!-- fin del cuerpo -->
                                                    </div><!-- fin del tab 1 -->
                                                    <!-- inicio del tab 2 -->
                                                    <div class="tab-pane" id="tab2">
                                                        <!-- cuerpo -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="border p-3 mt-4 mt-lg-0 rounded" style="border-style: dashed !important;">
                                                                    <!-- -->
                                                                    <div class="text-sm-right">
                                                                        <a href="proyects.php" class="btn btn-danger" style="border-radius: 30px !important;">
                                                                            SALIR
                                                                            <i class="dripicons-arrow-thin-right mr-1"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!-- -->
                                                                    <div class="col-lg-12 text-center">
                                                                        <a href="#" data-toggle="modal" data-target="#comenzarProceso" data-backdrop="static" data-keyboard="false" class="btn btn-success btn-rounded btn-lg" style="border-radius: 20px !important;">
                                                                            Comenzar procesamiento
                                                                        </a>
                                                                    </div>
                                                                    <br>
                                                                    <!-- -->
                                                                    <h4 class="header-title mb-3 text-center" style="font-weight: bold;">
                                                                        <i class="dripicons-graph-bar"></i>
                                                                        RESULTADOS DEL PROCESO
                                                                    </h4>
                                                                    <!-- -->
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>DATO1</th>
                                                                                    <th>DATO2</th>
                                                                                    <th>DATO3</th>
                                                                                    <th>DATO4</th>
                                                                                    <th>DATO5</th>
                                                                                </tr>
                                                                                <!-- -->
                                                                                <tr>
                                                                                    <td>00001</td>
                                                                                    <td>00002</td>
                                                                                    <td>00003</td>
                                                                                    <td>00004</td>
                                                                                    <td>00005</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- end table-responsive -->
                                                                    <div class="col-lg-12 text-center">

                                                                        <br>
                                                                        <a href="#" class="btn btn-dark btn-rounded" id="interactive-button-map">
                                                                            <i class="dripicons-location"></i>
                                                                            VER MAPA INTERACTIVO
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-lg-12 text-center" id="content-interactive-map">

                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                            </div> <!-- fin columna -->
                                                            <!-- -->
                                                        </div>
                                                        <!-- fin cuerpo -->
                                                    </div>
                                                    <!-- fin del tab 2-->
                                                </div>
                                                <!-- fin cuerpo tabs -->
                                            </div>
                                        </div><!-- end card-->
                                    </div><!-- end col-->
                                    <!-- end row-->
                                    <!-- FIN DE FORMULARIO -->

                                    <!-- end page title -->

                                    <div class="col-12">
                                        <div class="page-title-box">
                                            <h4 class="page-title">
                                                <i class="mdi mdi-file-upload"></i>
                                                TIF
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!-- card orthophoto view-->
                                        <div class="card">
                                            <div class="card-body">
                                                <!-- tabs -->
                                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                                    <li class="nav-item">
                                                        <a href="#tab4" data-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
                                                            <span class="d-md-block" id="textTitleTif">
                                                                <!-- titulo dinamico -->
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <!-- -->
                                                    <!-- <li class="nav-item">
                                                        <a href="#tab6" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                                            <span class="d-md-block">
                                                                Información del Proyecto
                                                            </span>
                                                        </a>
                                                    </li> -->
                                                    <!-- -->
                                                    <li class="nav-item">
                                                        <a href="#tab5" data-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                                            <span class="d-md-block">
                                                                Visualización de Tif
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- fin tabs -->

                                                <!-- cuerpo tabs -->
                                                <div class="tab-content">
                                                    <div class="tab-pane show active" id="tab4">
                                                        <!-- cuerpo del contenido tab4-->
                                                        <div class="text-sm-right">
                                                            <a href="proyects.php" class="btn btn-danger" style="border-radius: 30px !important;">
                                                                SALIR
                                                                <i class="dripicons-arrow-thin-right mr-1"></i>
                                                            </a>
                                                        </div>
                                                        <!-- -->
                                                        <div class="text-center">
                                                            <span>
                                                                Te encuentras en el proyecto - <b><?php echo $name_proyecto; ?></b>
                                                            </span>
                                                        </div>
                                                        <!-- -->
                                                        <hr>
                                                        <!-- DIV SUBIR IMÁGENES -->
                                                        <div id="uploadImgTif">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <input type="hidden" name="idProyect" id="idProyect" value="<?php echo $token; ?>">
                                                                </div>
                                                                <!-- -->
                                                                <div class="col-md-12" style="text-align: center;">
                                                                    <div class="form-group" style="margin-bottom: 0px;">
                                                                        <a id="uploadFileTif" name="uploadFileTif" href="javascript:;" class="btn btn-success" style="margin-bottom: 10px;">
                                                                            <i class="mdi mdi-plus"></i>
                                                                            Cargar Archivos
                                                                        </a>
                                                                        <!-- -->
                                                                        <a id="uploadTif" href="javascript:;" class="btn btn-danger" style="margin-bottom: 10px;display: none;">
                                                                            <i class="mdi mdi-file-upload-outline"></i>
                                                                            Subir Archivos
                                                                        </a>
                                                                        <!-- -->
                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                                <!-- -->

                                                                <div id="containertif">
                                                                    <!-- loading -->
                                                                    <div class="col-md-12 text-center" id="loaderPhotoTif" style="display: none;">
                                                                        <span id="loaderIconTif" role="status" class="mr-1 mb-2 spinner-border text-success" style="width: 2rem;height: 2rem;margin-bottom: 10px;">
                                                                            <span class="sr-only"></span>
                                                                        </span>
                                                                        <!-- img confirma -->
                                                                        <div class="text-center">
                                                                            <img src="assets/img/iconos/ok.png" id="imgSuccessTif" width="54" height="54" style="margin-bottom: 10px;">
                                                                        </div>
                                                                        <!-- fin img confirma-->
                                                                        <div class="text-center">
                                                                            <b id="textResultTif" class="mt-0">Procesando...</b><br>
                                                                            <span id="porcentajeTif"></span>
                                                                        </div>
                                                                        <!-- enlace reload -->
                                                                        <div class="text-center" id="reload">
                                                                            <a href="#" onclick="refresh();" style="color: red;">
                                                                                <b>Cargar imágenes</b>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <!-- fin loading  -->

                                                                    <!-- cabeceras para conteos -->
                                                                    <div class="table-responsive" id="etiquetas_tif" style="display: none;">
                                                                        <table class="table table-sm table-centered mb-0 font-14">
                                                                            <thead class="thead-light">
                                                                                <tr>
                                                                                    <th class="text-left" style="color: black;">
                                                                                        Archivos:
                                                                                        <span id="cantidad_archivos_tif">0</span>
                                                                                    </th>
                                                                                    <th class="text-right" style="color: black;">
                                                                                        Peso Total:
                                                                                        <span id="peso_archivos_tif">0</span>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                        </table>
                                                                    </div>
                                                                    <!-- fin de cabeceras -->

                                                                    <!-- listado de archivos subidos -->
                                                                    <div data-simplebar style="max-height: 400px;">
                                                                        <div id="filelistTif"></div>
                                                                    </div>
                                                                </div>

                                                                <!-- -->

                                                            </div> <!-- card body -->
                                                            <!-- DIV MOSTRAR IMAGENES -->
                                                            <div id="viewImg">
                                                                <!-- loader -->
                                                                <div id="loaderImgTif" class="text-center" style="display: none;">
                                                                    <span role="status" class="mr-1 spinner-border text-success" style="width: 2rem;height: 2rem;margin-bottom: 10px;">
                                                                        <span class="sr-only"></span>
                                                                    </span>
                                                                    <!-- -->
                                                                    <div id="textProcess">
                                                                        <span class="text-center" style="font-size: 12px;">Cargando...</span>
                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                                <!-- fin loader -->

                                                                <!-- CARGA DATA AJAX -->
                                                                <div id="resultDataTif">

                                                                </div>
                                                                <!-- FIN DATA AJAX-->
                                                            </div>
                                                            <!-- -->
                                                        </div> <!-- end card-body -->
                                                        <!-- fin del cuerpo -->
                                                    </div><!-- fin del tab 4 -->
                                                    <!-- inicio del tab 5 -->
                                                    <div class="tab-pane" id="tab5">
                                                        <!-- cuerpo -->
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="border p-3 mt-4 mt-lg-0 rounded" style="border-style: dashed !important;">
                                                                    <!-- -->
                                                                    <div class="text-sm-right">
                                                                        <a href="proyects.php" class="btn btn-danger" style="border-radius: 30px !important;">
                                                                            SALIR
                                                                            <i class="dripicons-arrow-thin-right mr-1"></i>
                                                                        </a>
                                                                    </div>
                                                                    <!-- -->
                                                                    <div class="col-lg-12 text-center">
                                                                        <!-- <a href="#" class="btn btn-info btn-rounded" id="token-project">
                                                                            Comenzar procesamiento
                                                                        </a> -->
                                                                        <!--Button trigger Modal -->
                                                                        <!-- <button type="button" class="btn btn-info btn-rounded btn-lg" data-toggle="modal" data-target="#myModal">
                                                                            Comenzar procesamiento
                                                                        </button> -->
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                        <h4 class="modal-title" id="myModalLabel">Comenzar procesamiento</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        Haga clic en "Comenzar procesamiento" para iniciar el procesamiento de las imágenes. Esto puede tardar un tiempo. ¿Desea continuar?
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                                                        <button type="button" class="btn btn-primary" data-backdrop="false" id="token-project" data-dismiss="modal">Comenzar procesamiento</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <!-- -->
                                                                    <h4 class="header-title mb-3 text-center" style="font-weight: bold;">
                                                                        <i class="dripicons-graph-bar"></i>
                                                                        RESULTADOS DEL PROCESO
                                                                    </h4>
                                                                    <!-- -->
                                                                    <div class="table-responsive">
                                                                        <table class="table mb-0">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>DATO1</th>
                                                                                    <th>DATO2</th>
                                                                                    <th>DATO3</th>
                                                                                    <th>DATO4</th>
                                                                                    <th>DATO5</th>
                                                                                </tr>
                                                                                <!-- -->
                                                                                <tr>
                                                                                    <td>00001</td>
                                                                                    <td>00002</td>
                                                                                    <td>00003</td>
                                                                                    <td>00004</td>
                                                                                    <td>00005</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- end table-responsive -->
                                                                    <div class="col-lg-12 text-center">

                                                                        <br>
                                                                        <a href="#" class="btn btn-dark btn-rounded" id="interactive-button-map">
                                                                            <i class="dripicons-location"></i>
                                                                            VER MAPA INTERACTIVO
                                                                        </a>
                                                                    </div>
                                                                    <div class="col-lg-12 text-center" id="content-interactive-map">

                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                            </div> <!-- fin columna -->
                                                            <!-- -->
                                                        </div>
                                                        <!-- fin cuerpo -->
                                                    </div>
                                                    <!-- fin del tab 2-->
                                                </div>
                                                <!-- fin cuerpo tabs -->
                                            </div>
                                        </div><!-- end card-->
                                    </div><!-- end col-->
                                    <!-- end row-->
                                    <!-- FIN DE FORMULARIO -->

                                    <!-- end page title -->

                                </div> <!-- container -->
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
                    <!-- validation  -->
                    <script src="assets/js/validation.min.js"></script>
                    <!-- jQuery -->
                    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script> -->
                    <!-- URLS -->
                    <script type="text/javascript">
                        BASE_URL = "http://144.22.43.182/assets/plugins/chuck/";
                        PROYECTID = $('#idProyect').val();
                        COUNT_IMG = <?php echo $count_img; ?>;
                        COUNT_TIF = <?php echo $count_tif; ?>;
                    </script>
                    <!-- Chunk Uploading -->
                    <script src="assets/plugins/chuck/plupload/plupload.full.min.js"></script>
                    <script type="text/javascript" src="assets/plugins/chuck/application.js"></script>
                    <script type="text/javascript" src="assets/plugins/chuck/applicationtif.js"></script>
                    <!-- CARGA LOADS -->
                    <script type="text/javascript">
                        //################### INICIAMOS EL DOCUMENTO Y CARGAMOS #########################//
                        $(document).ready(function() {
                            load_datos_tif();
                            load_datos();
                        });
                        //#################  REFRESCAR PAGINA ##########################################//
                        function refresh() {
                            location.reload();
                        }
                        //#################### FUNCIONES PARA ATRAER LOS DATOS POR AJAX PARA DATOS PRINCIPALES ###################//
                        function load_datos(page) {
                            //############################CANTIDAD DE IMAGENES PARA PROCESAMIENTO#############################
                            if (COUNT_IMG > 0) {
                                //$("#uploadImg").hide();//div de todo el form que sube las img 
                                $('#filelist').show(); //listado img
                                $('#uploadFile').remove(); //boton carga img
                                $('#textTitle').html('Listado de Imágenes');
                                $('#parrafoProyect').html('Visualización de tus imágenes subidas con anterioridad');
                                $('#etiquetas_imgs').hide();

                                //########################## LOAD AJAX DATA ########################################
                                var parametros = {
                                    "PROYECTID": PROYECTID,
                                    "page": page
                                };
                                $.ajax({
                                    url: 'view/proyects/loadImg.php',
                                    data: parametros,
                                    beforeSend: function(objeto) {
                                        $('#loaderImg').show();
                                    },
                                    success: function(data) {
                                        $("#resultData").html(data).fadeIn('slow');
                                        $("#loaderImg").hide();
                                    }
                                })
                                //########################## FIN LOAD AJAX DATA ########################################

                            } else if (COUNT_IMG == "" || COUNT_IMG == null) {
                                $('#uploadImg').show();
                                $('#filelist').show();
                                $('#textTitle').html('Subir Imágenes');
                                $('#parrafoProyect').html('Se recomienda no salir de esta pantalla al momento de iniciar el proceso de subida de imagenes al servidor.');
                            } else {
                                $('#uploadImg').show();
                                $('#filelist').show();
                                $('#textTitle').html('Subir Imágenes');
                                $('#parrafoProyect').html('Se recomienda no salir de esta pantalla al momento de iniciar el proceso de subida de imagenes al servidor.');
                            }


                        }

                        function load_datos_tif(page) {
                            //##############################CANTIDAD DE IMAGENES tif PARA VISUALIZACION###################
                            if (COUNT_TIF > 0) {
                                $('#filelistTif').show(); //listado img tif
                                $('#uploadFileTif').remove(); //boton carga img tif
                                $('#textTitleTif').html('Listado de Imágenes');
                                $('#parrafoProyectTif').html('Visualización de tus imágenes subidas con anterioridad');
                                $('#etiquetas_tif').hide();

                                //########################## LOAD AJAX DATA ########################################
                                var parametros = {
                                    "PROYECTID": PROYECTID,
                                    "page": page
                                };
                                $.ajax({
                                    url: 'view/proyects/loadImgTif.php',
                                    data: parametros,
                                    beforeSend: function(objeto) {
                                        $('#loaderImgTif').show();
                                    },
                                    success: function(data) {
                                        $("#resultDataTif").html(data).fadeIn('slow');
                                        $("#loaderImgTif").hide();
                                    }
                                })
                                //########################## FIN LOAD AJAX DATA ########################################

                            } else if (COUNT_TIF == "" || COUNT_TIF == null) {
                                $('#uploadImgTif').show();
                                $('#filelistTif').show();
                                $('#textTitleTif').html('Subir Tif');
                                $('#parrafoProyectTif').html('Se recomienda no salir de esta pantalla al momento de iniciar el proceso de subida de imagenes al servidor.');
                            } else {
                                $('#uploadImgTif').show();
                                $('#filelistTif').show();
                                $('#textTitleTif').html('Subir Tif');
                                $('#parrafoProyectTif').html('Se recomienda no salir de esta pantalla al momento de iniciar el proceso de subida de imagenes al servidor.');
                            }
                        }
                    </script>
                    <script>
                        var token_pro = $('#idProyect').val();
                        $('#interactive-button-map').on('click', function() {
                            $('#content-interactive-map').load('mapa/full-test.php?token=' + token_pro);
                        })

                        //mostrarRaster("assets/img/tiff/odm_orthophoto.tif");
                        //import {  } from "module";
                    </script>

                    <script>
                        $('#token-project').on('click', function() {
                            //var token = document.getElementById("")
                            var token_pro = $('#idProyect').val();
                            //var enlace = ""
                            console.log(token_pro);
                            api = "http://144.22.43.182:5000/proyect/" + token_pro + "/";
                            fetch(api, {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json",
                                },
                                body: JSON.stringify()

                            })
                        })
                    </script>
            </body>

            </html>

        <?php } else { ?>
            <script type='text/javascript' language='javascript'>
                alert('LO SENTIMOS, ESTE PROYECTO NO EXISTE EN NUESTRA BASE DE DATOS')
                document.location.href = 'proyects.php'
            </script>
        <?php } ?>

    <?php } else { ?>
        <script type='text/javascript' language='javascript'>
            alert('LO SENTIMOS, NO HEMOS ENCONTRADO LA INFORMACIÓN DEL PROYECTO')
            document.location.href = 'proyects.php'
        </script>
    <?php } ?>

<?php } else { ?>
    <script type='text/javascript' language='javascript'>
        alert('LO SENTIMOS, HEMOS DETECTADO QUE NO INICIASTE SESIÓN O NO TIENES ACCESO A ESTA ZONA')
        document.location.href = '403.html'
    </script>
<?php } ?>