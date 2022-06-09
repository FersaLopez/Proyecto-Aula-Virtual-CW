<?php
    session_id("sesion-act");
    session_name("AULA_CW");


    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../../statics/styles/template_Gates.css">
    <link rel="stylesheet" href="../../../../statics/styles/styles_aulas.css">
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
                
            /*
            require "../../config/config.php";        

            $con = connect();
        
            if(!$con)
            {
                echo "No se pudo conectar a la base";
            }
            else
            {            
                // $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;
                // $idAula = (isset($_POST["idAula"]) && $_POST["idAula"] != "")? $_POST["idAula"] : false;

                $sql = "INSERT INTO AULA_HAS_USUARIO (ID_AHU, ID_USUARIO, ID_AULA, ID_ROL) VALUES (0, $id_U, '$idAula', 1)";        
                
                
                
                $sql = "INSERT INTO AULA_HAS_USUARIO (ID_AHU, ID_USUARIO, ID_AULA, ID_ROL) VALUES (0, $id_U, '$idAula', 1)";
                $res = mysqli_query($con, $sql);
                //$row = mysqli_fetch_array($res);        
                //$row = mysqli_fetch_assoc($res);
        
                if($res == false)
                {
                    $respuesta = array("ok" => false, "texto" => "No se pudo ingresar los datos");
                    echo json_encode($respuesta);
                }
                else
                {                        
                $respuesta = array("ok" => true/*, "idAula" => $idAula_prototype);
                    echo json_encode($respuesta);
                }
                
                
            }
        */



        ?>


        </div>
        <h1 class="h1_workSpace">AULAS</h1>
        <div id="wS_Aulas" class="secciones_workSpace" ><!--style="display: none;"-->
            
            <section id="aula_tools" class="Aulas_toolsAula">

            </section>
            <section id="aula_Blocks" class="Aulas_AulaBlocks">
                <!-- <div class="AulaBlock">
                    <h4 class="AulaBlock_tipo">Tipo Aula</h4>
                    <h3 class="AulaBlock_nombre">NOMBRE MATERIA</h3>
                    <div class="AulaBlock_footer">
                        <span class="AulaBlock_profesor">Profesor</span>
                        <span class="AulaBlock_grado">Grado</span>
                    </div>
                </div>                -->
                
                
            </section>


        </div>        
        
        <div id="sec_form_CreacionAula" class="secciones_workSpace">

        </div>

        
        <div id="sec_Unirse_Aula" class="secciones_workSpace">

        </div>
        

        <!-- <div class="secciones_workSpace">

        </div> -->


    </section>
    <script src="../../../js/AULAS/aulasMainGate.js"></script>        
</body>
</html>