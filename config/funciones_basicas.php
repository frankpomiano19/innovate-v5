<?php
###### funcion para prevenir ataques XSS
function limpiar($tags)
{
    $tags = strip_tags($tags);
    $tags = stripslashes($tags);
    $tags = htmlentities($tags);
    return $tags;
}
##### CONTRASEÑA ENCRIPTAR
function encrypt($string, $key)
{
    $result = '';
    $key = $key . '2013';
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) + ord($keychar));
        $result .= $char;
    }
    return base64_encode($result);
}
##### CONTRASEÑA DESENCRIPTAR
function decrypt($string, $key)
{
    $result = '';
    $key = $key . '2013';
    $string = base64_decode($string);
    for ($i = 0; $i < strlen($string); $i++) {
        $char = substr($string, $i, 1);
        $keychar = substr($key, ($i % strlen($key)) - 1, 1);
        $char = chr(ord($char) - ord($keychar));
        $result .= $char;
    }
    return $result;
}
##### FUNCION LIMPIAR PARAMETROS
function limpiarEntrada($texto)
{
    //creamos un arreglo que sirva de patrones para eliminar partes no deseadas en las cadenas
    $busqueda = array(
        '@<script[^>]*?>.*?</script>@si',   // quitar javascript
        '@<[\/\!]*?[^<>]*?>@si',            // quitar tags de HTML
        '@<style[^>]*?>.*?</style>@siU',    // quitar estilos
        '@<![\s\S]*?--[ \t\n\r]*>@'         // quitar comentarios multil�nea
    );

    //utilizamos la funciÓNn preg_replace que busca en una cadena patrones para sustituir
    $salida = preg_replace($busqueda, '', $texto);
    //devolvemos la cadena sin los patrones encontrados
    return $salida;
}

//Método con token aleatoreo str_shuffle()
function generateClave($length)
{
    return substr(str_shuffle("123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

########### CALCULAR DIAS TRANSCURRIDOS ENTRE DOS FECHAS CONTANDO PURO DIAS HABILES #########
function fechas($start, $end)
{
    $range = array();

    if (is_string($start) === true) $start = strtotime($start);
    if (is_string($end) === true) $end = strtotime($end);

    if ($start > $end) return createDateRangeArray($end, $start);

    do {
        $range[] = date('Y-m-d', $start);
        $start = strtotime("+ 1 day", $start);
    } while ($start <= $end);

    return $range;
}
########### CALCULAR DIAS TRANSCURRIDOS ENTRE DOS FECHAS #########
function Dias_Transcurridos($fecha_i, $fecha_f)
{
    $dias    = (strtotime($fecha_i) - strtotime($fecha_f)) / 86400;
    $dias     = abs($dias);
    $dias = floor($dias);
    return $dias;
}
