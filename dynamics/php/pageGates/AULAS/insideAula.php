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
    <link rel="stylesheet" href="../../../../statics/styles/insideAula.css">
</head>
<body>
    <section id="right_sect" class="workSpace">
        <!-- AQUI VAN LAS DIFERENTES SECCIONES -->
        
        <?php
            $ID = $_SESSION["ID_U"];
            $name = $_SESSION["nombre"];
            $apodo = $_SESSION["apodo"];
            $id_TU = $_SESSION["ID_TU"];
            $tipo_user = $_SESSION["tipo_U"];
            $id_grado = $_SESSION["grado"];            


            $aula = (isset($_GET["aula"]) && $_GET["aula"] != "")? $_GET["aula"] : false;


            require "../../config/config.php";        

            $con = connect();

            if(!$con)
            {
                echo "No se pudo conectar a la base";
            }
            else
            {                                
                if(isset($_GET["aula"]) && $aula != false)
                {
                    $sql = "SELECT * FROM AULA INNER JOIN MATERIAS ON AULA.ID_MATERIAS = MATERIAS.ID_MATERIAS NATURAL JOIN GRUPO NATURAL JOIN TIPO_AULA NATURAL JOIN PRIVACIDAD WHERE ID_AULA = '$aula'";
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
            
            if(isset($_GET["aula"]) && $aula != false)
            {                                                           
                echo "
                        <div id=contDatosHidden style='display: fixed'>
                            <input id='userH_id' disabled value='$ID'>
                            <input id='userH_name' disabled value='$name'>
                            <input id='userH_apodo' disabled value='$apodo'>
                            <input id='userH_idTU' disabled value='$id_TU'>
                            <input id='userH_tipo' disabled value='$tipo_user'>
                            <input id='userH_grado' disabled value='$id_grado'>            
                            <input id='userH_aulaElegida' disabled value='$aula'>            
                            <br>
                            <input id='userH_A_idgrado' disabled value='$ID_GRADO'> 
                            <input id='userH_A_nombre' disabled value='$nombre'> 
                            <input id='userH_A_reun' disabled value='$reuniones_id'>                             
                            <input id='userH_A_desc' disabled value='$descripcion'>                             
                            <input id='userH_A_rutaF' disabled value='$ruta_foto'>                             
                            <input id='userH_A_materia' disabled value='$materias'>                             
                            <input id='userH_A_grupo' disabled value='$grupo'> 
                            <input id='userH_A_tipo' disabled value='$tipo'> 
                            <input id='userH_A_priv' disabled value='$privacidad'>                                                  
                            <input id='userH_A_docCreador' disabled value='$nombreDocenteCreador'>  
                        </div>
                    ";        
            }                         



        ?>
        
        <h1 id="tituloNombreAula" class="h1_nombreAula"></h1>        
        
        <section id="InformacionAula">
            <h2 id="nombreDocente"></h3>
            <h3 id="materia"></h4>
            <div id="sect1InfoA">
                <span id="grupo"></span>
                <span id="tipoAula"></span>
                <span id="grado"></span>                
            </div>
            <span id="privA"></span>
            <p></p>
            <div></div>
        </section>
        

        <div id="asignaciones" class="secciones_workSpace">
            <section id="asign_tools" class="asign_toolsAula">

            </section>
            <section id="asign_Blocks">
<!--                                 
                <div class="asignacion">
                    <h3 class="titulo_asign"></h3>
                    <span class="tipoAsign"></span>
                    <span class="fechaEntrega"></span>                
                </div>
                <div class="asignacion">
                    <h3 class="titulo_asign"></h3>
                    <span class="tipoAsign"></span>
                    <span class="fechaEntrega"></span>                
                </div>
                <div class="asignacion">
                    <h3 class="titulo_asign"></h3>
                    <span class="tipoAsign"></span>
                    <span class="fechaEntrega"></span>                
                </div> -->
                        
                
            </section>
        </div>

        <div id="tablon" class="secciones_workSpace">


        </div>
        <div id="crearAula" class="secciones_workSpace">

            
        </div>
        <div id="calificaciones" class="secciones_workSpace">

            
        </div>

        <div id='sec_Calificaciones' class="secciones_workSpace">
            <table>
                <thead>
                    <tr>
                        <th>Holi</th><th>Hi</th><th>Lol</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Holi</td><td>Hi</td><td>Lol</td>
                    </tr>
    
                </tbody>
            </table>   

        </div>

        <!-- <div class="secciones_workSpace">

            
        </div> -->
            


    </section>        
    <script src="../../../js/AULAS/insideAulas.js"></script>
</body>
</html>

