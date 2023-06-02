<?php
$con        = mysqli_connect('localhost', 'root', 'jetix', 'proyect_innovate', 3307);
$acentos    = $con->query("SET NAMES 'utf8'");
date_default_timezone_set("America/Lima");
if (mysqli_connect_errno()) {
    echo "Fallo la conexion MySQL " . mysqli_connect_error();
}
mysqli_set_charset($con, "utf8");
