<?php
date_default_timezone_set("America/Lima");
$fecha_actual 		= date("Y-m-d");
require_once("../../../config/other/db.php");
require_once("../../../config/other/conexion.php");
// Uncomment this one to fake upload time
// usleep(5000);
//number aleatoreo para colocar en la carpeta
// Make sure file is not cached (as it happens for example on iOS devices)
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
//5 minutos de tiempo de ejecución
@set_time_limit(5 * 60);
################## fin ##################################################
if (isset($_REQUEST['idProyecto'])) {
	######################### PARAMETROS PRINCIPALES #####################################
	$id_proyecto  		= intval($_REQUEST['idProyecto']);
	$ramdon 			= $id_proyecto;
	$path_target		=  "../../../files/" . $ramdon;
	$targetDir 			= "../../../files/" . $ramdon . "/imagenes";
	$finalDir  			= "../../../files/" . $ramdon . "/imagenes";
	$resultDir			= "../../../../files/" . $ramdon . "/results";
	$cleanupTargetDir 	= true; // Eliminar archivos antiguos - antes estaba en false
	$maxFileAge 		= 5 * 3600; // Temp file age in seconds 5 * 3600 - 60 * 60

	//Obtener parámetros
	$chunk  			= isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0; //status de procesos = 201 inicia
	$chunks 			= isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0; //conteo de procesos
	$fileName 			= isset($_REQUEST["name"]) ? $_REQUEST["name"] : ''; //datos del front de la imagen
	$tamano   			= $_FILES['file']['size'];
	//echo $tamano;
	#################### CALCULAMOS EL TAMAÑO DE LA IMAGEN ####################################################
	$tipo_dato = "Kb";
	//104 857 6
	//210 562
	//437 811
	###########################################################################################################
	// Make sure the fileName is unique but only if chunking is disabled
	if ($chunks > 0) {
		$ext  		= strrpos($fileName, '.');
		$fileName_a = substr($fileName, 0, $ext);
		$fileName_b = substr($fileName, $ext);

		$fileName  = "File" . $fileName_a . $fileName_b;
		$fileNameN = "File" . rand() . $fileName_b;
	}
	###########################################################################################################
	//Limpie el nombre del archivo por razones de seguridad
	$fileName 			= preg_replace('/[^\w\._]+/', '', $fileName);
	//Ruta donde se alojará el archivo
	$filePath 			= $targetDir . DIRECTORY_SEPARATOR . $fileName;
	###########################################################################################################
	//Crear carpeta para alojar las imagenes y sus resultados
	if (!file_exists($targetDir)) {
		@mkdir($path_target, 0777, true);
		@mkdir($targetDir, 0777, true);
		@mkdir($resultDir, 0777, true);
	}
	############################################################################################################
	//Eliminar archivos temporales antiguos
	if (is_dir($targetDir) && ($dir = opendir($targetDir))) {
		while (($file = readdir($dir)) !== false) {
			$filePath = $targetDir . DIRECTORY_SEPARATOR . $file;
			//Elimine los archivos temporales si son más antiguos que la edad máxima
			if (preg_match('/\\.tmp$/', $file) && (filemtime($filePath) < time() - $maxFileAge))
				@unlink($filePath);
		}

		closedir($dir);
	} else
		die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');

	//Busque el encabezado del tipo de contenido
	if (isset($_SERVER["HTTP_CONTENT_TYPE"]))
		$contentType = $_SERVER["HTTP_CONTENT_TYPE"];

	if (isset($_SERVER["CONTENT_TYPE"]))
		$contentType = $_SERVER["CONTENT_TYPE"];

	if (strpos($contentType, "multipart") !== false) {
		if (isset($_FILES['file']['tmp_name']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
			//Abrir archivo temporal
			$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
			if ($out) {
				//Lea el flujo de entrada binario y agréguelo al archivo temporal
				$in = fopen($_FILES['file']['tmp_name'], "rb");

				if ($in) {
					while ($buff = fread($in, 4096))
						fwrite($out, $buff);
				} else
					die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
				fclose($in); //
				fclose($out);
				unlink($_FILES['file']['tmp_name']);
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
		} else
			die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
	} else {
		// Open temp file
		$out = fopen($targetDir . DIRECTORY_SEPARATOR . $fileName, $chunk == 0 ? "wb" : "ab");
		if ($out) {
			// Lea el flujo de entrada binario y agréguelo al archivo temporal
			$in = fopen("php://input", "rb");

			if ($in) {
				while ($buff = fread($in, 4096)) {
					fwrite($out, $buff);
				}
			} else
				die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');

			fclose($in); //
			fclose($out);
		} else
			die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
	}
	//Mueve el archivo de $targetDir a $finalDir después de recibir el fragmento final
	if ($chunk == ($chunks - 1)) {
		rename($targetDir . DIRECTORY_SEPARATOR . $fileName, $finalDir . DIRECTORY_SEPARATOR . $fileNameN); //reemplazamos el name del archivo antiguo($fileName) por $fileNameN
		########################################## INSERTAR DATOS A  MYSQL #################################
		$insert_datos = mysqli_query($con, "INSERT INTO img_proyect VALUES (
						NULL,'$id_proyecto','$fileNameN','$tamano','$tipo_dato','$id_proyecto','$targetDir','$fecha_actual','$fecha_actual','1','1')");
		################## fin de la sentencia #############################################################
		echo $chunk . "<br>";
		echo $chunks - 1;
	}

	$respuesta 	   = "SE SUBIERON CORRECTAMENTE";
	//echo $insert_datos; 

} else {
	$respuesta = "NO HAY IDPROYECTO";
	exit;
}

$salidaJson = array("respuesta" => $respuesta);
echo json_encode($salidaJson);
