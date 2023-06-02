<?php
require_once("db_config.php");
class Db
{
    protected $p;
    protected $dbh;

    public function __construct()
    {
        if (!isset($this->dbh)) {
            // Connect to the database
            try {
                date_default_timezone_set('America/Lima');
                setlocale(LC_ALL, "es_PE.UTF-8", "es_PE", "esp"); ///definimos el idio de ESPAÑOL-PERU
                $conn = new PDO(
                    "mysql:host=" . DB_HOST . ";dbname=" . DB_DATA_BASE,
                    DB_USER,
                    DB_PASSWORD,
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                );
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->dbh = $conn;
            } catch (PDOException $e) {
                die("No se pudo conectar con MYSQL: " . $e->getMessage());
            }
        }
    }
    //FIN DEL FUNCTION CONSTRUCTOR 

    //FUNCION SETEAR NOMBRES
    public function SetNames()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    //FUNCION DE CONEXION A BD
    public function getConection()
    {
        return $this->dbh;
    }

    ###### FIN DE CLASE #####	
}
