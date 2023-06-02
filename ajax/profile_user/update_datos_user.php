<?php
include("../is_logged.php");
include("../../config/conexion.php"); 
$user_id = $_SESSION['id_user'];
//#################### CAPTURAMOS LAS VARIABLES DESDE EL FORM ##################################//
if ($_POST){
	if (empty($_POST["USUARIO_ID"]) or empty($_POST["TXT_DOC"]) or empty($_POST["TXT_NDOC"]) or empty($_POST["TXT_NOM"]) or empty($_POST["TXT_APE"])) 
	{
		$rptas = "1";
		$msm   = "LOS CAMPOS NO PUEDEN IR VACIOS, \nVERIFIQUE NUEVAMENTE POR FAVOR";
	}

		$query 				= mysqli_query($con,"select * from users where id_user='".$user_id."'");
		$rw                 = mysqli_fetch_array($query);
    	$name_img           = $rw['img_perfil'];
		$count 				= mysqli_num_rows($query);

		if ($count==1)
			{
				$txtDoc 	= strip_tags($_POST["TXT_DOC"]);
				$txtNdoc 	= strip_tags($_POST["TXT_NDOC"]);
				$txtNom 	= strip_tags($_POST["TXT_NOM"]);
				$txtApe	    = strip_tags($_POST["TXT_APE"]);
				$usuario 	= strip_tags($_POST["USUARIO_ID"]);
				$verificado = "1";
				//$countfiles = $_FILES['foto']['name'];
				//$countfiles = count($_FILES['foto']['name']);

				if (empty($_FILES["foto"]["name"]))
				{
						$nombre_archivo = $name_img;
				}else{

						$ruta            = '../../assets/img/users/';
						$filename        = $_FILES['foto']['name'];
	            		$sourceFoto      = $_FILES['foto']['tmp_name'];
						$tipo_archivo    = $_FILES['foto']['type'];
						$tamano_archivo  = $_FILES['foto']['size'];
						$newNameFoto     = $_POST["TXT_NDOC"].time().rand();
						//####### renombramos el file para evitar errores ###############//
	            		$explode        = explode('.', $filename);
	            		$extension_foto = array_pop($explode);
	            		$nuevoNameFoto  = $newNameFoto.'.'.$extension_foto;
	            		//####### ruta imagen ##########################################//
	            		$imagenCliente  = $ruta.$nuevoNameFoto;
	            		//compruebo si las caracter�sticas del archivo son las que deseo
						move_uploaded_file($sourceFoto, $imagenCliente);
						$nombre_archivo = $nuevoNameFoto;
				}

				//############################# EJECUTAMOS EL UPDATE ###################################################//
					$update = mysqli_query($con,"update users set id_tipo_doc='".$txtDoc."', num_documento='".$txtNdoc."', firstname='".$txtNom."', lastname='".$txtApe."', img_perfil='".$nombre_archivo."', verificado='".$verificado."' where id_user='".$usuario."' ");	

					if($update){
						$rptas = "3";
						$msm   = "HEMOS ACTUALIZADO TU PERFIL";
						
					}else{
						$rptas = "4";
						$msm   = "LO SENTIMOS, HEMOS PRESENTADO PROBLEMAS AL ACTUALIZAR";
						
					}	
			}else{
				$rptas = "5";
				$msm   = "NO EXISTEN REGISTROS QUE COINCIDAN PARA ACTUALIZAR";
			}
}else{
	$rptas = "6";
	$msm   = "NO SE ENVIARON LOS VALORES";
	
}//POST

$salidaJson =array("rptas" => $rptas, "msm" => $msm);
echo json_encode($salidaJson);

?>	
