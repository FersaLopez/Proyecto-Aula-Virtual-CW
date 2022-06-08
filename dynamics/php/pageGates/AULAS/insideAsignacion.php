<!-- <?php
    session_id("sesion-act");
    session_name("AULA_CW");

    session_start();
?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../statics/styles/template_Gates.css">
    <link rel="stylesheet" href="../../../../statics/styles/inside_Asignacion.css">
</head>
<body>
    <section id="right_sect" class="workSpace">
        <!-- AQUI VAN LAS DIFERENTES SECCIONES -->
        <!-- <?php
            $ID = $_SESSION["ID_U"];
            $name = $_SESSION["nombre"];
            $apodo = $_SESSION["apodo"];
            $id_TU = $_SESSION["ID_TU"];
            $tipo_user = $_SESSION["tipo_U"];
            $id_grado = $_SESSION["grado"];            


            $asign = (isset($_GET["asign"]) && $_GET["asign"] != "")? $_GET["asign"] : false;
            

            require "../../config/config.php";        

            $con = connect();

            if(!$con)
            {
                echo "No se pudo conectar a la base";
            }
            else
            {                                
                if(isset($_GET["asign"]) && $asign != false)
                {
                    $sql = "SELECT * FROM ASIGNACION NATURAL JOIN GRUPO NATURAL JOIN TIPO_AULA NATURAL JOIN PRIVACIDAD WHERE ID_AULA = '$aula'";
                    $res = mysqli_query($con, $sql);        
                    $row = mysqli_fetch_assoc($res);
                    
                    //echo "<br/><br/><br/>";
                    //var_dump($row);                    


                    $ID_GRADO = $row["ID_GRADO"];
                    $nombre = $row["nombre"];
                    $reuniones_id= $row["reuniones_id"];
                    $descripcion = $row["descripcion"];                            
                    $ruta_foto = $row["ruta_foto"];
                    $materias = $row["materias"];
                    $grupo = $row["grupo"];
                    $tipo = $row["tipo"];
                    $privacidad = $row["privacidad"];                                                                                                                                                                                                         

                    $sql = "SELECT nombre FROM AULA_HAS_USUARIO NATURAL JOIN USUARIO WHERE ID_AULA = '$aula' && ID_ROL = 1";
                    $res = mysqli_query($con, $sql);        
                    $row = mysqli_fetch_assoc($res);

                    $nombreDocenteCreador = $row["nombre"];                    

                }                
            }





            echo "
                    <div id=contDatosHidden style='display: fixed'>
                        <input id='userH_id' disabled value='$ID'>
                        <input id='userH_name' disabled value='$name'>
                        <input id='userH_apodo' disabled value='$apodo'>
                        <input id='userH_idTU' disabled value='$id_TU'>
                        <input id='userH_tipo' disabled value='$tipo_user'>
                        <input id='userH_grado' disabled value='$id_grado'>            
                    </div>
                ";        
        ?> -->

        <div class="secciones_workSpace">

        </div>

        <div class="secciones_workSpace">

        </div>

        <div class="secciones_workSpace">

        </div>


    </section>        
</body>
</html>