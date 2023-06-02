<?php 

require("conexion.php");

date_default_timezone_set("America/Lima");

$fecha_actual 		= date("Y-m-d H:i:s");
$fecha_calcula_mes 	= date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 
/*--------------------------------------------------------------*/
/* Function for Creting random string
/*--------------------------------------------------------------*/
function generarCodigo($longitud) 
    {
        $key = '';
        $pattern = '123456789';
        $max = strlen($pattern)-1;
        for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
        return $key;
    } 
$token_codigo=generarCodigo(6);//token para el registro 
/*--------------------------------------------------------------*/
/* FIN Function for Creting random string
/*--------------------------------------------------------------*/
if(isset($_POST['proceso'])){
	$proceso = $_POST['proceso'];
    if($proceso == "IniciarProceso"){
	
		$nombres 	= $_POST['txtNom'];
		$apellidos 	= $_POST['txtApe'];
		$email 		= $_POST['txtMail'];
		$clave   	= password_hash($_POST['txtClave'],PASSWORD_DEFAULT);

		//************************* Consultamos si existe el cliente por DOCUMENTO o CORREO **************************//
		$query_personal 	= mysqli_query($con, "select * from users where user_email='".$email."'");
		$count_personal 	= mysqli_num_rows($query_personal); 
		//************************ Fin Consultamos si existe el cliente por DOCUMENTO o CORREO ***********************//

		//******************************* verificamos y validamos si existen registros oiguales *********************//
		if ($count_personal==0)
		{
			$sql_personal = "INSERT INTO users (
				fecha_creacion, id_tipo_doc, num_documento,
				firstname, lastname, telefono, 
				user_email, user_name, user_password_hash, 
				img_perfil, cod_security, plataforma_access, 
				user_login_status, plan_work, id_espacio,
				fecha_inicio, fecha_finaliza) 
			VALUES(
				'$fecha_actual', '', '',
				'$nombres','$apellidos', '',
				'$email','$email','$clave','default.png','$token_codigo',
				'','1','','1','$fecha_actual','$fecha_calcula_mes');";

			$registro_ok 	= mysqli_query($con,$sql_personal);

			if($registro_ok){
				$respuesta 		= "SI";
			}else{
				$respuesta 		= "NO";
			}
		}else{
			$respuesta 		= "EXISTE";
		}

}else{
	$respuesta = "NO";
 }

$salidaJson =array("respuesta" => $respuesta);
echo json_encode($salidaJson);

}else{
    header("location:../index.php");
}

?>