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
        ?>


        </div>
        <h1 class="h1_workSpace">AULAS</h1>
        <div id="wS_Aulas" class="secciones_workSpace" ><!--style="display: none;"-->
            
            <section id="aula_tools" class="Aulas_toolsAula">

            </section>
            <section class="Aulas_AulaBlocks">
                <div class="AulaBlock">
                    <h4 class="AulaBlock_tipo">Tipo Aula</h4>
                    <h3 class="AulaBlock_nombre">NOMBRE MATERIA</h3>
                    <div class="AulaBlock_footer">
                        <span class="AulaBlock_profesor">Profesor</span>
                        <span class="AulaBlock_grado">Grado</span>
                    </div>
                </div>                

                <div class="AulaBlock">
                    <h4 class="AulaBlock_tipo">ETE</h4>
                    <h3 class="AulaBlock_nombre">CM</h3>
                    <div class="AulaBlock_footer">
                        <span class="AulaBlock_profesor">Carlos Alf</span>
                        <span class="AulaBlock_grado">5</span>
                    </div>
                </div>

                <div class="AulaBlock">
                    <h4 class="AulaBlock_tipo">Tipo Aula</h4>
                    <h3 class="AulaBlock_nombre">NOMBRE MATERIA</h3>
                    <div class="AulaBlock_footer">
                        <span class="AulaBlock_profesor">Profesor</span>
                        <span class="AulaBlock_grado">Grado</span>
                    </div>
                </div>

                
                
            </section>


        </div>

        <div id="sec_form_CreacionAula" class="secciones_workSpace">

        </div>

        <div class="secciones_workSpace">

        </div>


    </section>
    <script src="../../../js/AULAS/aulasMainGate.js">        
    </script>        
</body>
</html>