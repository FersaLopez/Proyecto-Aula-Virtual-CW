<?php
    session_id("sesion-act"); 
    session_name("AULA_CW"); 
    session_start(); 

    if(isset($_SESSION["ID_U"])){
        session_unset(); 
        session_destroy(); 
        echo "Se eliminaron las sesiones";
        //header("location:  ./inicio_sesion.php"); 
    }    

?>