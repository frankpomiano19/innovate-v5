<?php
require_once("classconexion.php");
session_start();
include_once('funciones_basicas.php');
#################################################### AQUI TERMINA LA CLASE LOGIN #################################################
class Login extends Db
{
	public function __construct()
	{
		parent::__construct();
	}
	######################################################## CLASE LOGIN #############################################################

	####################################  FUNCION PARA EXPIRAR SESSION POR INACTIVIDAD  ##########################################
	public function ExpiraSession()
	{
		if (!isset($_SESSION['usuario'])) { // Esta logeado?.
			header("Location: logout.php");
		}
		//Verifico el tiempo si esta seteado, caso contrario lo seteo.
		if (isset($_SESSION['time'])) {
			$tiempo = $_SESSION['time'];
		} else {
			$tiempo = strtotime(date("Y-m-d h:i:s"));
		}

		$inactividad = 360000000000000000;   //Exprecion en segundos.
		$actual =  strtotime(date("Y-m-d h:i:s"));

		if (($actual - $tiempo) >= $inactividad) {
?>
			<script type='text/javascript' language='javascript'>
				alert('SU SESSION A EXPIRADO \nPOR FAVOR LOGUEESE DE NUEVO PARA ACCEDER AL SISTEMA')
				document.location.href = 'logout.php'
			</script>
<?php

		} else {

			$_SESSION['time'] = $actual;
		}
	}
	############  FIN DE FUNCION PARA EXPIRAR SESSION POR INACIVIDAD  ################

	##################################### FUNCION PARA SELECCIONAR USUARIOS CON DATOS ACTUALIZADOS ###################
	public function UsuariosNoverificados()
	{
		self::SetNames();
		$sql = " select * from users where id_user = ? and verificado = 1";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($_SESSION['id_user']));
		$num = $stmt->rowCount();
		if ($num == 0) {
			$rptas = "1";
			echo "<script>
				swal({ 
					title: 'Hola, " . $_SESSION['firstname'] . "',
					text: 'Es necesario actualizar tus datos desde tu sección de Perfil',
              		imageUrl: 'assets/img/iconos/img-time.png',
              		showCancelButton: true,
              		confirmButtonColor: '#1e662e',
              		cancelButtonColor: '#f7f7f7',
              		confirmButtonText: 'Ir ahora',
              		cancelButtonText: 'En otro momento',		
                },
	                function(isConfirm){
	                	if (isConfirm) {
	                		window.location.href = 'profile.php';
	                	}
	            });
                </script>";
		} else {
			$rptas = "2";
			echo $num;
		}
	}

	###################### FIN DE FUNCION PARA SELECCIONAR USUARIOS CON DATOS ACTUALIZADOS ###############################

	#####################  FUNCION PARA ACCEDER AL SISTEMA ######################################################
	public function Logueo()
	{
		self::SetNames();
		if (empty($_POST["user_name"]) or empty($_POST["user_password"])) {

			$rptas = "1";
			$msm   = "LOS CAMPOS NO PUEDEN IR VACIOS ";
			//exit;
		}
		$pass = sha1(md5($_POST["user_password"]));
		$sql = " select * from users WHERE user_name  = ? and user_password_hash = ? and plataforma_access = 1 and user_login_status = 1";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array(strtoupper($_POST["user_name"]), $pass));
		$num = $stmt->rowCount();
		$sql1 = "select * from users WHERE user_name  = ? and plataforma_access = 1";
		$stmt1 = $this->dbh->prepare($sql1);
		$stmt1->execute(array(strtoupper($_POST["user_name"])));
		$num_user = $stmt1->rowCount();
		//file_put_contents("C:/Users/HP/Downloads/texto.txt", $num_user);
		if ($num == 0) {


			$rptas = "2";
			$msm   = "LOS DATOS INGRESADOS NO EXISTEN";

			//En caso de que exista el nombre de usuario y puso mal la contraseña
			if ($num_user > 0) {

				$sql_user = "select num_intentos from users WHERE user_name = ?";
				$stmt_user = $this->dbh->prepare($sql_user);
				$stmt_user->execute(array(strtoupper($_POST["user_name"])));
				$num_intent =  $stmt_user->fetch(PDO::FETCH_ASSOC);
				$num_intentos = (int) implode($num_intent);
				if ($num_intentos >= 3) {
					$msm = "HA SUPERADO EL NÚMERO DE INTENTOS PARA ENTRAR A LA PLATAFORMA. \n ESPERE UNA HORA PARA VOLVER A INGRESAR";
				} else {
					$num_intentos = $num_intentos + 1;
					$sql_int = "update users SET num_intentos = ? WHERE user_name = ?";
					$stmt_int = $this->dbh->prepare($sql_int);
					$stmt_int->bindParam(1, $num_intentos, PDO::PARAM_INT);
					$nom_user = strtoupper($_POST["user_name"]);
					$stmt_int->bindParam(2, $nom_user, PDO::PARAM_STR, 100);
					$stmt_int->execute();
					$int_restantes = 3 - $num_intentos;
					$msm = "LOS DATOS INGRESADOS NO EXISTEN.\n LE QUEDA " . strval($int_restantes) . " INTENTO(S)";
					if ($num_intentos == 3) {
						$sql_bloq = "update users SET inicio_bloqueo = ? WHERE user_name = ?";
						$stmt_bloq = $this->dbh->prepare($sql_bloq);
						$fecha_bloqueo = date("Y-m-d h:i:s");
						$stmt_bloq->bindParam(1, $fecha_bloqueo);
						$stmt_bloq->bindParam(2, $nom_user, PDO::PARAM_STR, 100);
						$stmt_bloq->execute();
						$msm = "HA SUPERADO EL NÚMERO DE INTENTOS PARA ENTRAR A LA PLATAFORMA. \n ESPERE UNA HORA PARA VOLVER A INGRESAR";
					}
				}
			}

			//exit;
		} else {
			$sql_user = "select num_intentos from users WHERE user_name = ?";
			$stmt_user = $this->dbh->prepare($sql_user);
			$stmt_user->execute(array(strtoupper($_POST["user_name"])));
			$num_intent =  $stmt_user->fetch(PDO::FETCH_ASSOC);
			$num_intentos = (int) implode($num_intent);
			if ($num_intentos >= 3) {
				$sql_desbloq = "select inicio_bloqueo from users WHERE user_name = ?";
				$stmt_desbloq = $this->dbh->prepare($sql_desbloq);
				$stmt_desbloq->execute(array(strtoupper($_POST["user_name"])));
				$row_des = $stmt_desbloq->fetch(PDO::FETCH_ASSOC);
				$fecha_des = date(implode($row_des));
				$fecha_actual = date("Y-m-d h:i:s");
				$tiempo_dif = strtotime($fecha_actual) - strtotime($fecha_des);
				file_put_contents("C:/Users/HP/Downloads/text.txt", $tiempo_dif);
				if ($tiempo_dif >= 3600) {
					if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$p[] = $row;
					}

					$_SESSION["id_user"] 			= $p[0]["id_user"];
					$_SESSION["fecha_creacion"] 	= $p[0]["fecha_creacion"];
					$_SESSION["firstname"] 			= $p[0]["firstname"];
					$_SESSION["lastname"] 			= $p[0]["lastname"];
					$_SESSION["user_email"] 		= $p[0]["user_email"];
					$_SESSION["img_perfil"] 		= $p[0]["img_perfil"];
					$_SESSION["plataforma_access"] 	= $p[0]["plataforma_access"];
					$_SESSION["user_login_status"] 	= $p[0]["user_login_status"];

					$query = " insert into log_session values (null, ?, ?, ?, ?); ";
					$stmt = $this->dbh->prepare($query);
					$stmt->bindParam(1, $a);
					$stmt->bindParam(2, $b);
					$stmt->bindParam(3, $c);
					$stmt->bindParam(4, $d);

					$a = strip_tags($_SERVER['REMOTE_ADDR']);
					$b = strip_tags(date("Y-m-d h:i:s"));
					$c = strip_tags($_SERVER['HTTP_USER_AGENT']);
					$d = $_SESSION["id_user"];
					$stmt->execute();

					//Reiniciar el contador de numero de intentos
					$sql_reiniciar_int = "update users SET num_intentos = 0 WHERE user_name = ?";
					$stmt_reiniciar_int = $this->dbh->prepare($sql_reiniciar_int);
					$stmt_reiniciar_int->execute(array(strtoupper($_POST["user_name"])));
					$stmt_reiniciar_int->execute();
					//
					$rptas = "3";
					$msm   = "EN BREVE TE REDIRIGIREMOS AL SISTEMA";
				} else {
					$rptas = "4";
					$msm   = "ESPERE UNA HORA PARA INTENTARLO NUEVAMENTE";
				}
			} else {
				if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$p[] = $row;
				}

				$_SESSION["id_user"] 			= $p[0]["id_user"];
				$_SESSION["fecha_creacion"] 	= $p[0]["fecha_creacion"];
				$_SESSION["firstname"] 			= $p[0]["firstname"];
				$_SESSION["lastname"] 			= $p[0]["lastname"];
				$_SESSION["user_email"] 		= $p[0]["user_email"];
				$_SESSION["img_perfil"] 		= $p[0]["img_perfil"];
				$_SESSION["plataforma_access"] 	= $p[0]["plataforma_access"];
				$_SESSION["user_login_status"] 	= $p[0]["user_login_status"];

				$query = " insert into log_session values (null, ?, ?, ?, ?); ";
				$stmt = $this->dbh->prepare($query);
				$stmt->bindParam(1, $a);
				$stmt->bindParam(2, $b);
				$stmt->bindParam(3, $c);
				$stmt->bindParam(4, $d);

				$a = strip_tags($_SERVER['REMOTE_ADDR']);
				$b = strip_tags(date("Y-m-d h:i:s"));
				$c = strip_tags($_SERVER['HTTP_USER_AGENT']);
				$d = $_SESSION["id_user"];
				$stmt->execute();

				//
				$rptas = "3";
				$msm   = "EN BREVE TE REDIRIGIREMOS AL SISTEMA";
			}
		}

		$salidaJson = array("rptas" => $rptas, "msm" => $msm);
		echo json_encode($salidaJson);
		//print_r($_POST);
		exit;
	}
	################################# FIN FUNCION PARA ACCEDER AL SISTEMA ##################################################

	############################################  FUNCION PARA REGISTRAR USUARIOS  ######################################
	public function RegistrarUsuarios()
	{
		self::SetNames();
		if (empty($_POST["txtNom"]) or empty($_POST["txtApe"]) or empty($_POST["txtMail"]) or empty($_POST["txtClave"])) {
			$rptas = "1";
			$msm   = "LOS CAMPOS NO PUEDEN IR VACIOS, \nVERIFIQUE NUEVAMENTE POR FAVOR";
			//exit;
		}

		$sql = " select user_email from users where user_email = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($_POST["txtMail"]));
		$num = $stmt->rowCount();
		if ($num > 0) {

			$rptas = "2";
			$msm   = "ESTE CORREO ELECTRONICO YA SE ENCUENTRA REGISTRADO, \nVERIFIQUE NUEVAMENTE POR FAVOR";
			//echo "3";
			//exit;
		} else {
			$sql = " select user_name from users where user_name = ? ";
			$stmt = $this->dbh->prepare($sql);
			$stmt->execute(array($_POST["txtMail"]));
			$num = $stmt->rowCount();
			if ($num == 0) {
				$query = " insert into users values (null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?); ";
				$stmt = $this->dbh->prepare($query);

				$stmt->bindParam(1, $fecha_create);
				$stmt->bindParam(2, $tipo_doc);
				$stmt->bindParam(3, $num_documento);
				$stmt->bindParam(4, $nombres);
				$stmt->bindParam(5, $apellidos);
				$stmt->bindParam(6, $telefono);
				$stmt->bindParam(7, $user_mail);
				$stmt->bindParam(8, $user_name);
				$stmt->bindParam(9, $clave);
				$stmt->bindParam(10, $imagen_perfil);

				$stmt->bindParam(11, $token_codigo);
				$stmt->bindParam(12, $plataforma);
				$stmt->bindParam(13, $status_access);
				$stmt->bindParam(14, $plan_access);
				$stmt->bindParam(15, $espacio);
				$stmt->bindParam(16, $fecha_inicio);
				$stmt->bindParam(17, $fecha_fin);
				$stmt->bindParam(18, $verify);
				$stmt->bindParam(19, $num_fallas);
				$stmt->bindParam(20, $fecha_bloqueo);

				$fecha_create 	= date("Y-m-d h:i:s");
				$tipo_doc		= "0";
				$num_documento	= "0";
				$nombres 		= strip_tags($_POST["txtNom"]);
				$apellidos 		= strip_tags($_POST["txtApe"]);
				$telefono		= "0";
				$user_mail 		= strip_tags($_POST["txtMail"]);
				$user_name 		= strip_tags($_POST["txtMail"]);
				$clave          = sha1(md5($_POST["txtClave"]));
				$imagen_perfil	= "default.png";
				$token_codigo 	=  strtoupper(generateClave(6));
				$plataforma		=  "1";
				$status_access	=  "1";
				$plan_access	=  "1";
				$espacio		=  "1";
				$fecha_inicio	=  date("Y-m-d");
				$fecha_fin		=  date("Y-m-d", strtotime($fecha_create . "+ 1 month"));
				$verify			=  "0";
				$num_fallas		=  "0";
				$fecha_bloqueo 	=  date("Y-m-d");

				$stmt->execute();



				$rptas = "3";
				$msm   = "EL USUARIO FUE REGISTRADO EXITOSAMENTE";
			} else {

				$rptas = "4";
				$msm   = "NO FUE POSIBLE REALIZAR EL REGISTRO";
				//echo "4";
				//exit;
			}
		}

		$salidaJson = array("rptas" => $rptas, "msm" => $msm);
		echo json_encode($salidaJson);
	}
	############################################  FIN DE FUNCION PARA REGISTRAR USUARIOS  ################################

	########################################  FUNCION PARA ACTUALIZAR PASSWORD  ##############################################
	public function ActualizarPassword()
	{
		if (empty($_POST["txtidusers"])) {
			$rptas = "1";
			$msm   = "HAY CAMPOS VACIOS";
		}
		self::SetNames();
		$sql = " up
		date users set "
			. " password = ? "
			. " where "
			. " id_user = ?;
			   ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->bindParam(1, $password);
		$stmt->bindParam(2, $codigo);

		$password  = sha1(md5($_POST["user_password_new"]));
		$codigo    = strip_tags($_SESSION["txtidusers"]);
		$stmt->execute();

		$rptas = "2";
		$msm   = "HEMOS ACTUALIZADO TU CLAVE";

		$salidaJson = array("rptas" => $rptas, "msm" => $msm);
		echo json_encode($salidaJson);

		exit;
	}
	######################################   FIN DE FUNCION PARA ACTUALIZAR PASSWORD ########################################

	######################################  FUNCION PARA CREAR PROYECTOS  ###################################################
	public function AddProyect()
	{
		if (empty($_POST["txtname"])) {
			$rptas = "1";
			$msm   = "ES NECESARIO COLOCAR UN NOMBRE AL PROYECTO";
		}
		$query = " insert into proyects values (null, ?, ?, ?, ?, ?, ?); ";
		$stmt = $this->dbh->prepare($query);
		######## declaramos variables con el contenido ####################
		$stmt->bindParam(1, $fecha_creacion);
		$stmt->bindParam(2, $name_proyect);
		$stmt->bindParam(3, $token_proyect);
		$stmt->bindParam(4, $status_proyect);
		$stmt->bindParam(5, $responsable_proyect);
		$stmt->bindParam(6, $resultado_proyect);
		######## fin declaramos variables con el contenido ################
		$fecha_creacion 		= date("Y-m-d h:i:s");
		$name_proyect 			= strip_tags($_POST["txtname"]);
		$token_proyect 			= strtoupper(generateClave(6));
		$status_proyect 		= "1";
		$responsable_proyect 	= $_SESSION["id_user"];
		$resultado_proyect 		= "";
		$stmt->execute();

		$rptas = "2";
		$msm   = "HEMOS REGISTRADO TU REPOSITORIO PARA TU PROYECTO";

		$salidaJson = array("rptas" => $rptas, "msm" => $msm);
		echo json_encode($salidaJson);

		exit;
	}
	######################################   FIN DE FUNCION PARA CREAR PROYECTOS  ###########################################

	################################################ FUNCION PARA MOSTRAR ITEMS PARA SERVICIOS POR CODIGO ################################################

	public function ItemsPorId()
	{
		self::SetNames();
		$sql = " select * from items where iditems = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array(base64_decode($_GET["iditems"])));
		$num = $stmt->rowCount();
		if ($num == 0) {
			echo "";
		} else {
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$this->p[] = $row;
			}
			return $this->p;
			$this->dbh = null;
		}
	}
	################################################ FIN DE FUNCION PARA MOSTRAR ITEMS PARA SERVICIOS POR CODIGO ################################################

	##################################  FUNCION PARA REGISTRAR CLIENTES  #############################
	public function RegistrarClientes()
	{
		self::SetNames();
		if (empty($_POST["cedcliente"]) or empty($_POST["nomcliente"])) {
			echo "1";
			exit;
		}

		$sql = " select cedcliente from clientes where cedcliente = ? ";
		$stmt = $this->dbh->prepare($sql);
		$stmt->execute(array($_POST["cedcliente"]));
		$num = $stmt->rowCount();
		if ($num == 0) {
			$query = " insert into clientes values (null, ?, ?, ?, ?, ?); ";
			$stmt = $this->dbh->prepare($query);
			$stmt->bindParam(1, $cedcliente);
			$stmt->bindParam(2, $nomcliente);
			$stmt->bindParam(3, $direccliente);
			$stmt->bindParam(4, $tlfcliente);
			$stmt->bindParam(5, $emailcliente);

			$cedcliente = strip_tags($_POST["cedcliente"]);
			$nomcliente = strip_tags($_POST["nomcliente"]);
			$direccliente = strip_tags($_POST["direccliente"]);
			$tlfcliente = strip_tags($_POST["tlfcliente"]);
			$emailcliente = strip_tags($_POST["emailcliente"]);
			$stmt->execute();

			echo "<div class='alert alert-success'>";
			echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			echo "<span class='fa fa-check-square-o'></span> EL CLIENTE FUE REGISTRADO EXITOSAMENTE </div>";
			echo "</div>";
			exit;
		} else {
			echo "2";
			exit;
		}
	}
	##################################  FUNCION PARA REGISTRAR CLIENTES  #############################




}
#################################################### AQUI TERMINA LA CLASE LOGIN ######################################################
?>