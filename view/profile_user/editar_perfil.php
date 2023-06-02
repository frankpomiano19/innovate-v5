<?php

require_once "config/class.php";
   
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
    $mail               = $rw['user_email'];
    $telefono           = $rw['telefono'];
    $num_documento      = $rw['num_documento'];
    $tipo_doc           = $rw['id_tipo_doc'];
    $fecha_view         = date("d/m/Y", strtotime($fecha_created));
    /***************** fin consultas directas a BD *****************************************************************/

    /***************** atraemos el dato de tipo DOC ***************************************************************/
    $sql_tipo_doc_id_user   = mysqli_query($con, "select * from tipo_documento where id_doc='" . $tipo_doc . "'");
    $rw_tipo_doc            = mysqli_fetch_array($sql_tipo_doc_id_user);
    if($tipo_doc >=1 ){
        $id_t_doc           = $rw_tipo_doc['id_doc'];
        $descripcion_doc    = $rw_tipo_doc['descripcion_doc'];
    }else{
        $id_t_doc           = "";
        $descripcion_doc    = "- Seleccione Tipo Documento -";
    }
    /***************** fin obtener dato de tipo documento  **********************************************************/
    $sql_tipo_doc       = mysqli_query($con, "select * from tipo_documento where status_doc='1'");
    //$rw_tipo_doc        = mysqli_fetch_array($sql_tipo_doc);
    /***************** FIN de atraer dato tipo DOC ***************************************************************/
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
<div class="container-fluid">                        
<!-- FORMULARIO CON DATOS DEL USUARIO -->
<!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
                                            <li class="breadcrumb-item active">Editar Perfil</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">
                                        <i class="mdi mdi-account-edit"></i>
                                        EDITAR PERFIL USUARIO
                                    </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- -->
                                                <h4 class="mt-2">Información del Perfil</h4>

                                                <p class="text-muted mb-4">
                                                        Por favor rellene los campos faltantes para efectuar la actualización de su perfil
                                                </p>
                                        <!-- -->
                                        <form name="updateusuario" id="updateusuario" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-7">
                                                        <input type="hidden" name="usuario" id="usuario" value="<?php echo $user_id; ?>">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="billing-first-name">Tipo de documento:
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <select class="form-control" id="txtDoc" name="txtDoc" autocomplete="off">

                                                                            <option value="<?php echo $id_t_doc; ?>"><?php echo $descripcion_doc; ?></option>    

                                                                            <?php
                                                                                
                                                                                while ($rterms = mysqli_fetch_array($sql_tipo_doc)) {
                                                                            ?>    
                                                                                <option value="<?php echo $rterms['id_doc']; ?>">
                                                                                    <?php echo $rterms['descripcion_doc']; ?>
                                                                                </option>
                                                                            
                                                                            <?php 
                                                                                }
                                                                            ?>   
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!-- -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="billing-last-name">Número de Documento:
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <input class="form-control" type="text" name="txtNdoc" id="txtNdoc" placeholder="000000000000" autocomplete="off" value="<?php echo $num_documento;?>">
                                                                        </div>
                                                                    </div>
                                                                    <!-- -->
                                                                </div>
                                                                <!-- -->
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="billing-last">Nombres:
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <input class="form-control" type="text" name="txtNom" id="txtNom" placeholder="Tus Nombres" autocomplete="off" value="<?php echo $nombre;?>">
                                                                        </div>
                                                                    </div>
                                                                    <!-- -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="billing-last">Apellidos:
                                                                                <span class="text-danger">*</span>
                                                                            </label>
                                                                            <input class="form-control" type="text" name="txtApe" id="txtApe" placeholder="Tus Apellidos" autocomplete="off" value="<?php echo $apellido;?>">
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <!-- end row -->
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="billing-email-address">Correo Electrónico: 
                                                                                
                                                                            </label>
                                                                            <input class="form-control" type="text" placeholder="Ingresa tu Correo" id="txtMail" name="txtMail" maxlength="100" autocomplete="off" value="<?php echo $mail;?>" disabled>

                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                        
                                                    </div><!-- col-7 fin-->

                                                    <div class="col-lg-5">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label for="projectname" class="mt-0">Foto Perfil:</label>
                                                                    <p class="text-muted font-14">
                                                                        Tamaño de miniatura recomendado 600x400 (px)
                                                                    </p>
                                                                    <!-- -->
                                                                    <div class="text-center mb-2">
                                                                        <img src="assets/img/users/<?php echo $_SESSION['img_perfil'];?>" alt="image" class="img-fluid rounded-circle img-thumbnail" width="120">
                                                                    </div>
                                                                    <!-- -->
                                                                    <div class="form-group">
                                                                        <input type="file" class="form-control" name="foto" id="foto" onchange="ValidarTamano(this);">
                                                                        <small>
                                                                            <p>Para Subir su Fotografia debe tener en cuenta lo siguiente:
                                                                                <br> * La Imagen debe ser extension .jpg
                                                                                <br> * La imagen no debe ser mayor de 900 KB
                                                                            </p>
                                                                        </small>
                                                                    </div>
                                                                    <!-- -->
                                                            </div>
                                                        </div>    
                                                    </div>
                                            </div>
                                            <!-- -->
                                            <div class="row">
                                            <!-- COLUMNA 3 BOTONES  -->
                                            <div class="col-xl-12">
                                                <div class="form-group mt-4 text-center">
                                                    <button type="submit" name="btn-update" id="btn-update" class="btn btn-success">Guardar</button>
                                                    <a href="profile.php" class="btn btn-secondary">Cancelar</a>
                                                </div>
                                            </div>
                                            <!-- FIN COLUMNA 3 BOTONES  -->
                                        </div>
                                        <!-- end row -->
                                     </form>   
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
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
<script src="view/profile_user/index.js"></script>
    </body>
</html>
<?php 
} else { 
    header("location: ../403.html");//sino, mandalo al login
    exit;
}      
?>   