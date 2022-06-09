<?php
define("DBHOST", "localhost");
define("DBUSER", "root");
define("PASSWORD", "");
define("DB", "aula_cw");

function connect()
{
    $conexion = mysqli_connect(DBHOST, DBUSER, PASSWORD, DB);
    if(!$conexion)
    {
        mysqli_error();
        echo "No se pudo hacer la conexión a aula_cw";
    }
    return $conexion;
}
$con = connect();
?>