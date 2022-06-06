<?php
    require "../config/config.php";    
    require "../config/common_queries.php";    

    $con = connect();
       

    $tipo_U = (isset($_POST["tipo_U"]) && $_POST["tipo_U"] != "")? $_POST["tipo_U"] : false;

    $nombre = (isset($_POST["nombre"]) && $_POST["nombre"] != "")? $_POST["nombre"] : false;

    $apell_pat = (isset($_POST["apellido_pat"]))? $_POST["apellido_pat"] : false;
    $apell_mat = (isset($_POST["apellido_mat"]))? $_POST["apellido_mat"] : false;
    
    $contra = (isset($_POST["password"]) && $_POST["password"] != "")? $_POST["password"] : false;
    
    $apodo = (isset($_POST["apodo"]))? $_POST["apodo"] : false;
    $correo = (isset($_POST["correo"]))? $_POST["correo"] : false;
    //$correo = $_GET["correo"];

    $identf = (isset($_POST["num_ident"]) && $_POST["num_ident"] != "")? $_POST["num_ident"] : false;

    function verRedRegistroCorrecto($query, $con, $correo)
    {
        if($query == true)
        {
            
            $id_U = obtenerID("ID_USUARIO", $con, "USUARIO", "correo", $correo, true);
            $ID = $id_U["ID_USUARIO"];
            
            
            $sql = "SELECT ID_TIPO_USER, tipo_usuario, ID_GRADO, apodo, nombre FROM USUARIO NATURAL JOIN TIPO_USER WHERE ID_USUARIO = $ID";
            $query = mysqli_query($con, $sql);
            //echo $sql."<br>";
            //var_dump($query);
/*
            while($row = mysqli_fetch_assoc($query))
            {
                $resultados[] = $row;
            }*/
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);        
            var_dump($datos);

            $id_TU = $datos["ID_TIPO_USER"];
            $tipo_user = $datos["tipo_usuario"];
            $id_grado = $datos["ID_GRADO"];
            $apodoo = $datos["apodo"];
            $name = $datos["nombre"];

            echo $id_TU."<br>".$tipo_user."<br>".$id_grado."<br>".$apodoo.$name;
            
        
            // session_unset();
            // session_destroy();
            
            //session_id("$ID");
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
        else
            echo "La peticion salio mal";

    }
    
    //verRedRegistroCorrecto(true, $con, $correo);

    if($con && $tipo_U != false && $nombre != false && $contra != false && $identf != false)
    {        
        // echo $tipo_U;   
        // echo $apodo;        

        $verif_Creacion = true;
        $mensaje_error = "";
        
        if($tipo_U == 1)
        {
            if(mysqlExistRegistroAll($apodo, $con, "usuario", "apodo", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Este apodo no esta disponible. Intenta otro";
            }
            if(mysqlExistRegistroAll($identf, $con, "usuario", "num_identificador", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el RFC/num. cuenta ingresado. Intenta iniciar Sesión";
            }
            if(mysqlExistRegistroAll($correo, $con, "usuario", "correo", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el correo ingresado. Intenta iniciar Sesión";
            }

            if($verif_Creacion == true)
            {
                $sql = "INSERT INTO USUARIO 
                        (ID_USUARIO, ID_ESTADO, ID_TIPO_USER, ID_GRADO, nombre, apodo, apellido_paterno, apellido_materno,
                        num_identificador, correo, ruta_foto, estado_unico, telefono, password) VALUES 
                        (0, 1, $tipo_U, NULL, '$nombre', '$apodo', '$apell_pat', '$apell_mat', '$identf', '$correo', NULL, NULL, NULL, '$contra')";
                $query = mysqli_query($con, $sql);
                verRedRegistroCorrecto($query, $con, $correo);
                //var_dump($query);                
                //echo "podes hacer registro";
            }
            else
                header("location: ./registroUsuarios.php?user=$tipo_U&reg_exist=$mensaje_error");            
        }
        else if($tipo_U == 3 || $tipo_U == 4)
        {
            if(mysqlExistRegistroAll($apodo, $con, "usuario", "apodo", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Este apodo no esta disponible. Intenta otro";
            }
            if(mysqlExistRegistroAll($identf, $con, "usuario", "num_identificador", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el RFC/num. cuenta ingresado. Intenta iniciar Sesión";
            }
            if(mysqlExistRegistroAll($correo, $con, "usuario", "correo", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el correo ingresado. Intenta iniciar Sesión";
            }

            if($verif_Creacion == true)
            {
                $sql = "INSERT INTO USUARIO 
                        (ID_USUARIO, ID_ESTADO, ID_TIPO_USER, ID_GRADO, nombre, apodo, apellido_paterno, apellido_materno,
                        num_identificador, correo, ruta_foto, estado_unico, telefono, password) VALUES 
                        (0, 1, $tipo_U, NULL, '$nombre', '$apodo', NULL, NULL, '$identf', '$correo', NULL, NULL, NULL, '$contra')";
                $query = mysqli_query($con, $sql);
                verRedRegistroCorrecto($query, $con, $correo);
                // var_dump($query);                
                // echo "podes hacer registro";
            }
            else
                header("location: ./registroUsuarios.php?user=$tipo_U&reg_exist=$mensaje_error");            
        }
        else if($tipo_U == 2)
        {            
            if(mysqlExistRegistroAll($identf, $con, "usuario", "num_identificador", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el RFC/num. cuenta ingresado. Intenta iniciar Sesión";
            }
            if(mysqlExistRegistroAll($correo, $con, "usuario", "correo", true) != NULL)
            {
                $verif_Creacion = false;
                $mensaje_error = "Ya existe una cuenta con el correo ingresado. Intenta iniciar Sesión";
            }

            if($verif_Creacion == true)
            {
                $sql = "INSERT INTO USUARIO 
                        (ID_USUARIO, ID_ESTADO, ID_TIPO_USER, ID_GRADO, nombre, apodo, apellido_paterno, apellido_materno,
                        num_identificador, correo, ruta_foto, estado_unico, telefono, password) VALUES 
                        (0, 1, $tipo_U, NULL, '$nombre', NULL, '$apell_pat', '$apell_mat', '$identf', '$correo', NULL, NULL, NULL, '$contra')";
                $query = mysqli_query($con, $sql);
                verRedRegistroCorrecto($query, $con, $correo);
                // var_dump($query);                
                // echo "podes hacer registro";
            }
            else
                header("location: ./registroUsuarios.php?user=$tipo_U&reg_exist=$mensaje_error");            
        }        


    }

?>