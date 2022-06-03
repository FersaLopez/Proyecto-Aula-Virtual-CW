<?php

//Esta es la sección para lxs profesorxs 
session_name("profesor"); 
session_ID("23847392"); 
session_start(); 

$RFC = (isset($_POST["RFC"]) && $_POST["RFC"] != "")? $_POST["RFC"]:false; 
$contrasenaProfesor = (isset($_POST["contrasenaProfesor"]) && $_POST["contrasenaProfesor"] != "")? $_POST["contrasenaProfesor"]:false; 

if($RFC != false && $contrasenaProfesor != false){
    $_SESSION["RFC"] = $RFC; 
    $_SESSION["contrasenaProfesor"] = $contrasenaProfesor; 
    echo "¡Hola! Es hora de enseñar";
    echo "
     <form action='./cierre_sesion_profesor.php' method='POST' target='_self'>
            <button>Cerrar sesión</button>
    </form>
     "; 
}
else if($_SESSION["RFC"] && $_SESSION["contrasenaProfesor"]){
    echo "¡Hola! Es hora de enseñar";
    echo "
     <form action='./cierre_sesion_profesor.php' method='POST' target='_self'>
            <button>Cerrar sesión</button>
    </form>
     "; 
}

?>