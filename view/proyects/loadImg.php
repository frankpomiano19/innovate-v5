<?php
require_once "../../config/class.php";
include("../../config/conexion.php");
######################## CAPTURAMOS LA VARIABLE ID ####################################################################
if (isset($_REQUEST['PROYECTID'])) {
    $proyect_id = $_REQUEST['PROYECTID'];
    ###################################################################################################################
    $tables = "img_proyect";
    $campos = "*";
    $sWhere = "id_proyect='" . $proyect_id . "' and status_imagen=1";
    ##################### CONSULTA DE REGISTRO EN IMAGENES ############################################################
    $sql_proyect_img    = mysqli_query($con, "SELECT count(*) AS numrows FROM img_proyect where id_proyect='" . $proyect_id . "' and status_imagen=1 ");
    if ($row = mysqli_fetch_array($sql_proyect_img)) {
        $numrows = $row['numrows'];
    } else {
        echo mysqli_error($con);
    }

    ######################## Paginación #############################################################################
    include 'pagination.php';
    $page       = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1; //cantidad de paginas
    $per_page   = 24; //mostrar item por pagina 
    $adjacents  = 1;
    $offset     = ($page - 1) * $per_page;

    $total_pages    = ceil($numrows / $per_page);
    $reload         = 'loadImg.php';
    ###################### fin de paginación ######################################################################
    $query      = mysqli_query($con, "SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
}

if ($numrows > 0) {

    $count = $offset;
    $finales = 0;

?>
    <!-- Aqui el codigo a recargar -->
    <div class="row">
        <!-- script php para mostrar registros -->
        <?php while ($row = mysqli_fetch_array($query)) {
            ######################## SACAMOS LAS VARIABLES A NECESITAR MOSTRAR ######################################## 
            $id_imagen          = $row['id_img'];
            $cod_proyecto       = $row['id_proyect'];
            $imagen             = $row['name_imagen'];
            $tamano_img         = $row['size_imagen'];
            $formato_img        = $row['formatt'];
            $folder             = $row['folder_imagen'];
            $url_imagen         = "/mnt/vol1/files/" . $folder . "/" . $imagen;

            $extraer_extension  = strrpos($imagen, '.');
            $fileName_b         = substr($imagen, $extraer_extension);
            ######################## FIN SACAMOS LAS VARIABLES A NECESITAR MOSTRAR ########################################   
            $finales++;
            $count++;
        ?>

            <div class="col-xl-3">
                <div class="card mb-1 shadow-none border" style="border-style: dashed!important;">
                    <div class="p-2">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-primary-lighten text-primary rounded" style="background-color: #2a3042 !important;color: white !important;">
                                        <?php echo $fileName_b; ?>
                                    </span>
                                </div>
                            </div>
                            <!-- -->
                            <div class="col pl-0">
                                <a href="javascript:void(0);" class="text-muted font-weight-bold">
                                    <?php echo $imagen; ?>
                                </a>
                                <p class="mb-0" style="font-size: 11px;">
                                    <?php echo $tamano_img . " " . $formato_img; ?> - Sin Procesar
                                </p>
                            </div>
                            <!-- -->
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="javascript:void(0);" class="btn btn-link btn-lg text-muted">
                                    <i class="dripicons-cross" style="color: red;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin de card -->
        <?php
        }
        //fin del while 
        ?>
    </div>
    <!-- paginador -->
    <div class="box-footer clearfix" style="border-top: 1px solid #f4f4f4;padding-top: 15px;margin-top: 15px;font-size: 12px !important;">
        <?php
        $inicios = $offset + 1;
        $finales += $inicios - 1;
        echo "Mostrando $inicios al $finales de $numrows registros";
        echo paginate($reload, $page, $total_pages, $adjacents);
        ?>
    </div>
    <!-- fin del paginador -->
    <!-- fin del codigo a recargar -->
<?php } else { ?>
    <div class="col-md-12" style="padding-top: 20px;text-align:center;padding-left: 20px;">
        <img src="assets/img/iconos/caja_vacia.svg" width="80" height="80">
        <p>Lo sentimos, actualmente no hay imágenes en este proyecto</p>
    </div>
<?php } ?>