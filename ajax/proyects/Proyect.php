<?php
include("../is_logged.php");
include("../../config/conexion.php"); 
$user_id = $_SESSION['id_user'];
//Método con token aleatoreo str_shuffle()
function generateClave($length)
{
   return substr(str_shuffle("123456789"), 0, $length);
}

switch ($_GET["process"])
{
	case "guardarProyecto":
			if(!empty($_POST['txtname']))
					{
						$fecha_creacion 			= date("Y-m-d h:i:s");
						$name_proyect 				= strip_tags($_POST["txtname"]);
						$token_proyect 			= strtoupper(generateClave(8));
						$status_proyect 			= "1";
						$responsable_proyect 	= $user_id;
						$resultado_proyect 		= "";
						//######################### REGISTRAMOS DIRECTO A LA BD ##########################################################//
						$insert  = mysqli_query($con,"INSERT INTO proyects(date_created,proyect_name,proyect_token_security,proyect_status,proyect_responsability_user,proyect_result_process) VALUES ('$fecha_creacion','$name_proyect','$token_proyect','$status_proyect','$responsable_proyect','$resultado_proyect')");
						//######################### EVALUAMOS SI SE REGISTRÓ O NO #######################################################//
						if($insert){
							$rptas = "1";
							$msm   = "HEMOS REGISTRADO TU PROYECTO";		
						}else{
							$rptas = "2";
							$msm   = "HEMOS PRESENTADO PROBLEMAS AL REALIZAR EL REGISTRO";			
						}
							
			}else{
						$rptas = "3";
						$msm   = "ES NECESARIO COLOCAR UN NOMBRE AL PROYECTO";
			}

			//################ SALIDA DE DATOS ###########################################//
			$salidaJson =array("rptas" => $rptas, "msm" => $msm);
			echo json_encode($salidaJson);
			//#############################################################################//

	break;

	case "listarProyect":
		$sql_list_proy = mysqli_query($con, "select * from proyects where proyect_responsability_user='" . $user_id . "' and proyect_status > 0 order by id_proyect desc");
		$count 			= mysqli_num_rows($sql_list_proy);
		//################################### html ################################################//
			if ($count > 0 || $count != null) {
					$count = 1;
					echo '<div class="row">';
					while($row = mysqli_fetch_array($sql_list_proy))
					{
					//################ VARIABLES DESDE LA BD #############################//
					$name_proyecto 	= $row['proyect_name'];
					$fecha_creacion   = $row['date_created'];
					$token_proyecto   = $row['proyect_token_security'];
					$fecha_view 	   = date("d/m/Y", strtotime($fecha_creacion));

					############################# contamos los files por proyecto #####################################################
					$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM img_proyect where id_proyect=$token_proyecto");
					$row_files 		= mysqli_fetch_array($count_query);
					$numrows 		= $row_files['numrows'];

					############################ sumamos la capacidad de todos los archivos y mostramos ##############################
					$count_file    	= mysqli_query($con,"SELECT sum(size_imagen) as totalFiles from img_proyect where id_proyect = $token_proyecto");
					$row_files_space 	= mysqli_fetch_array($count_file);
					$numrows_space 	= $row_files_space['totalFiles'];

					if (1024 > $numrows_space) {
			        $peso = $numrows_space.' B';
			    	} else if (1048576 > $numrows_space) {
			        $peso = round(($numrows_space / 1024)). ' KB';
			    	} else if (1073741824 > $numrows_space) {
			        $peso = round(($numrows_space / 1024) / 1024). ' MB';
			    	} else if (1099511627776 > $numrows_space) {
			        $peso = round(((($numrows_space / 1024) / 1024) / 1024)). ' GB';
			    	}

						echo '
								<!-- card N°1-->
									<div class="col-md-2 col-xl-2">
						        		<!-- project card -->
									        <div class="card d-block" style="border-radius: 1.10rem !important;">
									            <div class="card-body" style="padding: 1.1rem 1.5rem !important;">
									                <div class="dropdown card-widgets">
									                	<!-- candado -->
									                    <a href="#">
									                    	<i class="mdi mdi-lock-open"></i>
									                    </a>
									                  <!-- circulos menu -->  
									                    <a href="#" class="dropdown-toggle arrow-none" data-toggle="dropdown" aria-expanded="false">
									                        <i class="mdi mdi-dots-vertical" style="color: black;"></i>
									                    </a>
									                    <div class="dropdown-menu dropdown-menu-right" style="">
									                        <!-- item-->
									                        <a href="javascript:void(0);" class="dropdown-item">
									                        	<i class="mdi mdi-pencil mr-1"></i> 
									                        	Editar
									                        </a>
									                        <!-- item-->
									                        <a href="javascript:void(0);" class="dropdown-item">
									                        	<i class="mdi mdi-delete mr-1"></i>
									                        	Eliminar
									                        </a>
									                    </div>
									                    <!-- -->
									                </div>
									                <!-- project title-->                   
									                <img class="img-responsive" src="assets/img/folder1.png" width="48" height="52" alt="aPv6mhRt" title="aPv6mhRt">
									                <!-- -->
									                <h4 class="mt-0" style="padding: 0.3rem 0.1rem;">
									                    <a href="#" class="text-gg" style="color: #42546B!important;">
									                        <b>'.$name_proyecto.'</b>
									                    </a>
									                </h4>
									                <!-- project detail-->
									                <p class="text-start font-12" style="margin-bottom: 15px;">
									                    <span class="pr-2 mb-2 text-nowrap">
									                        <i class="mdi mdi-calendar-month"></i>
									                        '.$fecha_view.'
									                    </span>
									                    <!-- --><br>
									                    <span class="text-nowrap d-inline-block">
                                                <i class="mdi mdi-image-multiple-outline"></i>
                                                <b>'.$numrows.'</b> Archivos
                                            	  </span>
                                            	  <!-- --><br>
                                            	  <span class="text-nowrap d-inline-block">
                                            	  	 <i class="mdi mdi-sd"></i>
                                            	  	 <b>'.$peso.'</b>
                                            	  </span>
									                </p>            
									                <!-- boton sube imagenes -->    
									                <a href="uploadimagen.php?imgStr='.$token_proyecto.'" class="btn btn-success btn-sm" style="width: 100%;background: #2a3042;border-color: black;border-radius: 10px;">
									                	Subir Imágenes
									                	<i class="mdi mdi-chevron-right-circle"></i>
									                </a>
									                <!-- fin boton imagenes -->
									            </div> <!-- end card-body-->
									        </div> <!-- end card-->              
						    		</div>
								<!-- fin del card -->
						';

								if ($count%6==0)
								{
									echo "<div class='clearfix'></div>";
								}
									$count++;
					}
							echo '</div>';//fin del row
			}else{
				echo '
				<div class="col-md-12" style="padding-top: 20px;text-align:center;">
    					<img src="assets/img/iconos/caja_vacia.svg" width="80" height="80">
    					<p>No tienes proyectos creados hasta el momento</p>
				</div>';
			}
		//################################### fin html ###########################################//
	break;
}


?>	
