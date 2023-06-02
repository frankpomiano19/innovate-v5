<?php

//################################################################################//
if(isset($_SESSION['user_email']) && isset($_SESSION['user_login_status']) && isset($_SESSION['plataforma_access']) && $_SESSION['plataforma_access'] == 1) {
    //###########################################################################//
    //require_once("config/class.php"); 
    include("config/conexion.php"); 
    //###########################################################################//
    $user_id = $_SESSION['id_user'];
    /***************** consultas directas a BD *********************************************************************/
    $query_user         = mysqli_query($con,"select * from users where id_user='".$user_id."'");
    $rw                 = mysqli_fetch_array($query_user);
    $nombre             = $rw['firstname'];
    $apellido           = $rw['lastname'];
    $correo             = $rw['user_email'];
    $fecha_created      = $rw['fecha_creacion'];
    $fecha_finaliza     = $rw['fecha_finaliza'];
    $mail               = $rw['user_email'];
    $telefono           = $rw['telefono'];
    $num_documento      = $rw['num_documento'];
    $fecha_view         = date("d/m/Y", strtotime($fecha_created));
    $fecha_view_f       = date("d/m/Y", strtotime($fecha_finaliza));
    $verify             = $rw['verificado'];
    $tipo_doc           = $rw['id_tipo_doc'];
    $imagenPerfil       = $rw['img_perfil'];

    if($verify == 1){
        $variable_activado = "SI";
    }else{
        $variable_activado = "NO";
    }
    /***************** fin consultas directas a BD *****************************************************************/

    /***************** obtener dato de tipo documento  *************************************************************/
    $sql_tipo_doc       = mysqli_query($con, "select * from tipo_documento where id_doc='" . $tipo_doc . "'");
    $rw_tipo_doc        = mysqli_fetch_array($sql_tipo_doc);
    if($tipo_doc >=1 ){
        $descripcion_t_doc  = $rw_tipo_doc['descripcion_doc'];
    }else{
        $descripcion_t_doc="";
    }
    /***************** fin obtener dato de tipo documento  **********************************************************/

    /**************** LOGS REGISTROS *******************************************************************************/
    $query_logs = mysqli_query($con,"select * from log_session where id_user='" . $user_id . "' order by  id_log DESC LIMIT 7 ");
    /**************** FIN DE LOGS REGISTROS ************************************************************************/
?>

<!DOCTYPE html>
<html lang="es">
<!-- head -->
    <head>
        <?php 
            include("config/head.php");
        ?>
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
<!-- Start Content-->
 <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                            <li class="breadcrumb-item active">Perfil</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Perfil</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-3">
                                <!-- Personal-Information -->
                                <div class="card">
                                    <div class="card-body" style="padding: 1.5rem 1.5rem !important;">
                                        <h4 class="header-title mt-0 mb-3 text-center">Información de tu cuenta</h4>
                                        <!-- -->
                                        <div class="text-center mb-2">
                                            <img src="assets/img/users/<?php echo $imagenPerfil;?>" class="rounded-circle avatar-lg img-thumbnail" alt="profile">
                                        </div>
                                        <!-- -->
                                        <div class="text-center">
                                            <!-- <small style="margin-right: 10px;">
                                                <strong>Tipo Documento :</strong> <?php //echo $descripcion_t_doc;?>
                                            </small>-->
                                            <!-- -->
                                            <!--<small>
                                             <strong>Documento : </strong> <?php //echo $num_documento;?>
                                            </small>-->
                                        </div>
                            
                                        <hr/>

                                        <div class="text-left">
                                            <p class="text-dark">
                                                <strong>Fecha de Creación :</strong> 
                                                <span class="ml-2">
                                                    <?php echo $fecha_view;?>
                                                    <i class="mdi mdi-check-decagram" style="color: #009b3a;"></i>
                                                </span>
                                            </p>
                                            <!-- -->
                                            <p class="text-dark">
                                                <strong>Nombres :</strong> 
                                                <span class="ml-2"><?php echo $nombre;?></span>
                                            </p>
                                            <!-- -->
                                            <p class="text-dark">
                                                <strong>Apellidos :</strong> 
                                                <span class="ml-2"><?php echo $apellido;?></span>
                                            </p>
                                            <!-- -->
                                            <p class="text-dark">
                                                <strong>Email :</strong> 
                                                <span class="ml-2"><?php echo $correo;?></span>
                                            </p>
                                            <!-- -->
                                            <!-- 
                                            <p class="text-dark">
                                                <strong>Tipo de cuenta :</strong> 
                                                <span class="ml-2">FREE</span>
                                            </p>-->
                                            <!-- -->
                                            <!--
                                            <p class="text-dark">
                                                <strong>Cuenta Verificada :</strong> 
                                                <span class="badge badge-secondary float-right ml-2">
                                                    <?php //echo $variable_activado;?>
                                                </span>
                                            </p>-->
                                            <!-- -->
                                            <!--
                                            <p class="text-dark">
                                                <strong>Fecha Finaliza Acceso :</strong> 
                                                <span class="ml-2"><?php //echo $fecha_view_f;?></span>
                                            </p>-->
                                        </div>
                                        <!-- -->
                                        <div class="form-group mt-4 text-center">
                                            <a href="edit_profile.php" class="btn btn-success btn-sm mb-2">
                                                <i class="mdi mdi-square-edit-outline"></i>
                                                Editar
                                            </a>
                                            <!-- -->
                                            <a href="#" data-toggle="modal" data-target="#editClaveModal" data-backdrop="static" data-keyboard="false" class="btn btn-danger btn-sm mb-2">
                                                <i class="mdi mdi-refresh-circle"></i>
                                                Cambiar Clave
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal-Information -->
                            </div> <!-- end col-->

                            <div class="col-lg-9">

                                <!-- Chart-->
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Registro de Sesiones</h4>
                                        <!-- table --> 
                                        <div class="table-responsive">
                                                    <table class="table table-borderless table-nowrap mb-0">
                                                        <thead class="thead-light text-dark">
                                                            <tr>
                                                                <th class="tabel-login">#</th>
                                                                <th class="tabel-login">Fecha Registro</th>
                                                                <th class="tabel-login">Equipo / Detalles</th>
                                                                <th class="tabel-login">Dirección IP</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php 
                                                                $indice=0;
                                                                while($row_logs = mysqli_fetch_array($query_logs))
                                                                {
                                                                    $iplog          = $row_logs['ip_log'];
                                                                    $timepo_log     = $row_logs['tiempo_log'];
                                                                    $detalle_log    = $row_logs['detalle_log'];

                                                                    $indice++;
                                                            ?>

                                                            <tr>
                                                                <td class="color-table-login"><?php echo $indice;?></td>
                                                                <td class="color-table-login"><?php echo $timepo_log;?></td>
                                                                <td class="color-table-login"><?php echo $detalle_log;?></td>
                                                                <td class="color-table-login"><?php echo $iplog;?></td>
                                                            </tr>
                                                           <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        <!-- fin table -->     
                                    </div>
                                </div>
                                <!-- End Chart-->
                                    <!-- columna para espacio disco duro -->
                                    <!--<div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">
                                                    Espacio actual en el disco
                                                </h4>
                                                -->
                                                <!-- 
                                                <div class="mt-1">
                                                    <h4 style="text-align: right;">
                                                        <i class="dripicons-disc"></i>
                                                    </h4>
                                                    <h6 class="text-uppercase">Espacio total en el disco 8GB</h6>
                                                    <div class="progress my-2 progress-sm">
                                                        <div class="progress-bar progress-lg bg-success" role="progressbar" style="width: 46%" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <p class="text-muted font-12 mb-0">4.02 GB (46%) of 8 GB usado</p>
                                                </div>
                                            </div>
                                        </div>
                                   </div>-->        
                                   <!-- fin columna para espacio disco duro -->
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

<!-- modales -->
<?php 
    include("modal/cambiar_clave_plataforma.php");
?>
<!-- fin modales -->

        
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
<script src="view/profile_user/update_clave.js"></script>
<script src="assets/js/validation.min.js"></script> 
    </body>
</html>
<?php 
} else { 
    header("location: ../403.html");//sino, mandalo al login
    exit;
}      
?>   