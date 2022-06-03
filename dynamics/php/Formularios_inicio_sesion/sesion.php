<?php
//Esta es la sección para lxs alumnxs 
session_name("alumno"); 
session_ID("240604"); 
session_start(); 

$numeroCuenta = (isset($_POST["NumeroCuenta"]) && $_POST["NumeroCuenta"] != "")? $_POST["NumeroCuenta"]:false; 
$contrasenaAlumno = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "")? $_POST["contrasena"]:false; 

if($numeroCuenta != false && $contrasenaAlumno != false){
     $_SESSION["NumeroCuenta"] = $numeroCuenta; 
     $_SESSION["contrasena"] = $contrasenaAlumno;
     echo "¡Hola! Es hora de aprender"; 
     echo "
     <form action='./cierre_sesion.php' method='POST' target='_self'>
            <button>Cerrar sesión</button>
    </form>
     "; 

}
else if($_SESSION["NumeroCuenta"] && $_SESSION["contrasena"]){
    echo "¡Hola! Es hora de aprender"; 
    echo "
    <form action='./cierre_sesion.php' method='POST' target='_self'>
           <button>Cerrar sesión</button>
   </form>
    "; 
}

?>


