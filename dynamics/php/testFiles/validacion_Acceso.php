<?php
    require "../config.php";    

    $tipo_U = (isset($_POST["tipo_User"]) && $_POST["tipo_User"] != "")? $_POST["tipo_User"] : false;
    if(connect() && $tipo_U != false)
    {   
        $ident = (isset($_POST["identIdent"]) && $_POST["identIdent"] != "")? $_POST["identIdent"] : false;
        $ident = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "")? $_POST["contrasena"] : false;

        if($tipo_U == 1)
        {
            echo "¡Bienvenido Alumno <br/>";            
        }
        else if($tipo_U == 2)
        {
            echo "¡Bienvenido Docente! <br/>";
        }
        else if($tipo_U == 3)
        {
            echo "¡Bienvenido Moderador! <br/>";
        }

        else if($tipo_U == 4)
        {
            echo "¡Bienvenido Admin! <br/>";
        }
    }
    else
    {
        echo "Algo salio Mal";
    }


?>