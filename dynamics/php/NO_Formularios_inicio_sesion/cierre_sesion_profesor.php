<?php

session_name("profesor"); 
session_ID("23847392"); 
session_start(); 

if(isset($_SESSION["RFC"])){
    session_unset(); 
    session_destroy(); 
    header("location:  ./inicio_sesion.php"); 
}
?>