<?php

/*
require "../config/config.php";    
    require "../config/common_queries.php";    

    $con = connect();
       

    $ID_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;
    $ID_TU = (isset($_POST["id_TU"]) && $_POST["id_TU"] != "")? $_POST["id_TU"] : false;
    $tipo_U = (isset($_POST["tipo_U"]) && $_POST["tipo_U"] != "")? $_POST["tipo_U"] : false;
    $id_grado = (isset($_POST["id_grado"]) && $_POST["id_grado"] != "")? $_POST["id_grado"] : false;
    $apodo = (isset($_POST["apodo"]) && $_POST["apodo"] != "")? $_POST["apodo"] : false;
    $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false;

    //echo $ID_U." + ".$ID_TU." + ".$tipo_U." + ".$id_grado." + ".$apodo;

  */  

    session_id("sesion-act");
    session_name("AULA_CW");


    session_start();

    echo $_SESSION["nombre"];    

    // $_SESSION["ID_U"] = $ID_U;
    // $_SESSION["nombre"] = $nombre;
    // $_SESSION["apodo"] = $apodo;
    // $_SESSION["ID_TU"] = $ID_TU;
    // $_SESSION["tipo_U"] = $tipo_U;
    // $_SESSION["grado"] = $id_grado;
?>