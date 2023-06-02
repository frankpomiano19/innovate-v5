<?php
include("../is_logged.php");
include("../../config/conexion.php"); 
$user_id = $_SESSION['id_user'];
//#################### CAPTURAMOS LAS VARIABLES DESDE EL FORM ##################################//
if ($_POST){
	if(!empty($_POST['user_password_new']))
	{
		$user_password 	= $_POST['user_password_new'];
		$user_id_reg	= intval($user_id);

		//$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
		$user_password_hash = sha1(md5($_POST["user_password_new"]));
		$query 				= mysqli_query($con,"select * from users  where id_user='".$user_id_reg."'");
		$count 				= mysqli_num_rows($query);

		if ($count==1)
			{
				$update 	= mysqli_query($con,"update users set user_password_hash='".$user_password_hash."' where id_user='".$user_id_reg."' ");

				if($update){
						$rptas = "1";
						$msm   = "HEMOS ACTUALIZADO TU CLAVE";
						
					}else{
						$rptas = "2";
						$msm   = "HEMOS PRESENTADO PROBLEMAS AL ACTUALIZAR";
						
					}
			}else{
				$rptas = "3";
				$msm   = "NO EXISTEN REGISTROS QUE COINCIDAN PARA ACTUALIZAR";
				
			}
	}else{
		$rptas = "4";
		$msm   = "NO EXISTE LA VARIABLE CLAVE";
		
	}
}else{
	$rptas = "5";
	$msm   = "NO SE ENVIARON LOS VALORES";
	
}//POST


$salidaJson =array("rptas" => $rptas, "msm" => $msm);
echo json_encode($salidaJson);

?>	
