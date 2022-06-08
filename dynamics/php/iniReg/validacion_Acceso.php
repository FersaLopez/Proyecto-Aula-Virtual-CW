<?php
    require "../config/config.php";    
    require "../config/common_queries.php";    
    $con = connect();
    $tipo_U = (isset($_POST["tipo_User"]) && $_POST["tipo_User"] != "")? $_POST["tipo_User"] : false;
    //echo $tipo_U;
    if($con && $tipo_U != false)
    {   
        $ident = (isset($_POST["identIdent"]) && $_POST["identIdent"] != "")? $_POST["identIdent"] : false;
        $contra = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "")? $_POST["contrasena"] : false;

        if(mysqlExistRegistroAll($ident, $con, "usuario", "num_identificador") == NULL)
        {
            header("location: ./registroUsuarios.php?user=$tipo_U");
        }
        else
        {
            $sql = "SELECT ID_USUARIO, ID_TIPO_USER, tipo_usuario, ID_GRADO, apodo, nombre FROM USUARIO NATURAL JOIN TIPO_USER WHERE num_identificador = '$ident'";
            $query = mysqli_query($con, $sql);
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);        
            //var_dump($datos);

            $ID = $datos["ID_USUARIO"];
            $id_TU = $datos["ID_TIPO_USER"];
            $tipo_user = $datos["tipo_usuario"];
            $id_grado = $datos["ID_GRADO"];
            $apodoo = $datos["apodo"];
            $name = $datos["nombre"];

            echo $ID."<br>".$id_TU."<br>".$tipo_user."<br>".$id_grado."<br>".$apodoo."<br>".$name;
            
            session_id("sesion-act");
            session_name("AULA_CW");
        
            
            session_start();
        
            $_SESSION["ID_U"] = $ID;
            $_SESSION["nombre"] = $name;
            $_SESSION["apodo"] = $apodoo;
            $_SESSION["ID_TU"] = $id_TU;
            $_SESSION["tipo_U"] = $tipo_user;
            $_SESSION["grado"] = $id_grado;
        }
        
    }
    else
    {
        echo "Algo salio Mal";
    }


?>