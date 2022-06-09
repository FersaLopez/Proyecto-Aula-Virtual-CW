<?php
require "../../config/config.php"; 
$con = connect();

if(!$con)
{
    echo "No se pudo conectar a la base";
}
else
{ 

session_id("sesion-act");
session_name("AULA_CW");


session_start();

$ID = $_SESSION["ID_U"];
            $name = $_SESSION["nombre"];
            $apodo = $_SESSION["apodo"];
            $id_TU = $_SESSION["ID_TU"];
            $tipo_user = $_SESSION["tipo_U"];
            $id_grado = $_SESSION["grado"];            
            
            echo "
                    <div id=contDatosHidden style='display: none'>
                        <input id='userH_id' disabled value='$ID'>
                        <input id='userH_name' disabled value='$name'>
                        <input id='userH_apodo' disabled value='$apodo'>
                        <input id='userH_idTU' disabled value='$id_TU'>
                        <input id='userH_tipo' disabled value='$tipo_user'>
                        <input id='userH_grado' disabled value='$id_grado'>            
                    </div>
                ";    

$titulo = (isset($_POST["titulo"]) && $_POST["titulo"] != "")? $_POST["titulo"] : false; 
$dia = (isset($_POST["dia"]) && $_POST["dia"] != "")? $_POST["dia"] : false; 
$mes = (isset($_POST["mes"]) && $_POST["mes"] != "")? $_POST["mes"] : false; 
$tipo = (isset($_POST["tipo"]) && $_POST["tipo"] != "")? $_POST["tipo"] : false; 

echo $titulo;

}
?>