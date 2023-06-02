<?php
$token = $_GET['token'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet.draw vector editing handlers</title>

    <!-- <?php
            include("../config/config_map.php");
            ?> -->
</head>

<body>
    <select name="ubicacion" id="ubicacion">
        <option value="-1">Seleccione un lugar</option>
    </select>
    <div id="map"></div>
    <input name="idProyect" id="idProyect" value="<?php echo $token; ?>">
    <script src="assets/js/mapa.js"></script>
</body>

</html>