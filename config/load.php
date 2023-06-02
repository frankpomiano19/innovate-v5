
<?php
// -----------------------------------------------------------------------
// DEFINE SEPERATOR ALIASES
// -----------------------------------------------------------------------
define("URL_SEPARATOR", '/');
define("DS", DIRECTORY_SEPARATOR);
// -----------------------------------------------------------------------
// DEFINE ROOT PATHS
// -----------------------------------------------------------------------
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT.DS);

require_once(LIB_PATH_INC.'db_config.php');
require_once(LIB_PATH_INC.'classconexion.php');
//require_once(LIB_PATH_INC.'funciones_basicas.php');
//require_once(LIB_PATH_INC.'class.php');

//############## OTROS FILES #######################//
//require_once(LIB_PATH_INC.'conexion.php');
//require_once(LIB_PATH_INC.'db.php');

//require_once(LIB_PATH_INC.'Login.php');
//require_once(LIB_PATH_INC.'password.php');
?>
