<?php
    require "../config/config.php";    
    require "../config/common_queries.php"; 
    // require "seguridad"   
    
    $con = connect();
    $tipo_U = (isset($_POST["tipo_User"]) && $_POST["tipo_User"] != "")? $_POST["tipo_User"] : false;
    // $pimientita_acceso = generar_pimienta(); 
    //  $salesita_acceso = generar_sal();
    
    
    //echo $tipo_U;

    if($con && $tipo_U != false)
    {   
        
        $ident = (isset($_POST["identIdent"]) && $_POST["identIdent"] != "")? $_POST["identIdent"] : false;
        $contrasena = (isset($_POST["contrasena"]) && $_POST["contrasena"] != "")? $_POST["contrasena"] : false;
        // $contrasena_hasheada = password_hash($contrasena, PASSWORD_DEFAULT); 
    
        
        if(mysqlExistRegistroAll($ident, $con, "usuario", "num_identificador", true) == NULL)
        {
            header("location: ./registroUsuarios.php?user=$tipo_U");
        }
        else
        { 
            $sql="SELECT ID_USUARIO, ID_TIPO_USER, tipo_usuario, ID_GRADO, apodo, nombre, password FROM USUARIO NATURAL JOIN TIPO_USER WHERE num_identificador = '$ident'";
            $query = mysqli_query($con, $sql);
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);    
            
            $ID = $datos["ID_USUARIO"];
            $id_TU = $datos["ID_TIPO_USER"];
            $tipo_user = $datos["tipo_usuario"];
            $id_grado = $datos["ID_GRADO"];
            $apodoo = $datos["apodo"];
            $name = $datos["nombre"];
            $validar = $datos["password"]; 

            //var_dump($datos);
            if(password_verify($contrasena, $validar)){
                session_id("sesion-act");
                session_name("AULA_CW");
                session_start();
                $_SESSION["ID_U"] = $ID;
                $_SESSION["nombre"] = $name;
                $_SESSION["apodo"] = $apodoo;
                $_SESSION["ID_TU"] = $id_TU;
                $_SESSION["tipo_U"] = $tipo_user;
                $_SESSION["grado"] = $id_grado; 
                header("location: ../pageGates/lobby.php"); 
            }
            else{
                echo "Introduzca la contraseña correcta";
            
            }
           
            
        
              

            
        
            
            
            
            // echo $ID."<br>".$id_TU."<br>".$tipo_user."<br>".$id_grado."<br>".$apodoo."<br>".$name."<br>".$contra_hasheada;
            
        }    
    }
    else{
        echo "Algo salió mal";
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

        }*/
    


        // $peticion2 = "SELECT * FROM USUARIO WHERE password = '".$concat_acceso."' AND Sal = '".$sal_base."' ";
?>


