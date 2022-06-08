<?php
    require "../config/config.php";    
    require "../config/common_queries.php";    
    // require "./seguridad.php";

    function generar_pimienta(){
        $caracteres = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz');
        $pimienta = '';
        $partes_pimienta = array_rand($caracteres,4);
        $pimienta = $caracteres[$partes_pimienta[0]].$caracteres[$partes_pimienta[1]].$caracteres[$partes_pimienta[2]].$caracteres[$partes_pimienta[3]].$caracteres[$partes_pimienta[4]];
        return $pimienta;
    };
    
    function generar_sal(){
        $sal = uniqid();
        return $sal;
    };

    $salesita = generar_sal(); 
    $pimientita = generar_sal(); 
    

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
            $contra = $_POST["contrasena"];

            $contra_hasheada = hash("sha256", $contra.$salesita.$pimientita);
            echo $ID."<br>".$id_TU."<br>".$tipo_user."<br>".$id_grado."<br>".$apodoo."<br>".$name."<br>".$contra_hasheada;
 
            

            
            session_id("sesion-act");
            session_name("AULA_CW");
        
            
            session_start();
        
            $_SESSION["ID_U"] = $ID;
            $_SESSION["nombre"] = $name;
            $_SESSION["apodo"] = $apodoo;
            $_SESSION["ID_TU"] = $id_TU;
            $_SESSION["tipo_U"] = $tipo_user;
            $_SESSION["grado"] = $id_grado;

            // $contra_hasheada = hash("sha256", $contra.$sal.$pimienta);
            // echo $contra_hasheada;
            // echo '<br><br>'; 
            
            


        }    

        /*
        if($tipo_U == 1)
        {
            // echo "¡Bienvenido Alumno! <br/>";            
            // $sql = "SELECT * FROM privacidad WHERE ID_PRIV = 3";
            // $res = mysqli_query($con, $sql);
            // $row = mysqli_fetch_array($res);
            // var_dump($row);
            echo $ident."<br/>";
            //var_dump(mysqlExistRegistro($ident, $con, "usuario", "num_identificador"));
            if(mysqlExistRegistro($ident, $con, "usuario", "num_identificador") == NULL)
            {
                header("location: ./registroUsuarios.php?user=$tipo_U");
            }
            
        }//los else ifs son para verificar entrada al sistema, todos tendran header
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
        }*/
    }
    else
    {
        echo "Algo salio Mal";
    }


?>