<?php
session_name("alumno"); 
session_ID("240604"); 
session_start(); 

if(isset($_SESSION["NumeroCuenta"])){
    session_unset(); 
    session_destroy(); 
    header("location:  ./inicio_sesion.php"); 
}

?>