<?php

include ("./config.php");
$conexion = connect();

$peticion = "SELECT ID_USUARIO, ID_AULA, nombre FROM aula_has_usuario NATURAL JOIN aula";
$query = mysqli_query($conexion, $peticion);
$resultados = [];
while($row = mysqli_fetch_assoc($query))
{
    $resultados[] = array("id_usuario" => $row["ID_USUARIO"], "id_aula" => $row["ID_AULA"], "name_curso" => $row["nombre"]);
}

echo json_encode($resultados);
?>