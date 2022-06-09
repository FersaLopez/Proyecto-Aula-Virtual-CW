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
    <title>Esa es la Question</title>
    <!-- <link rel="stylesheet" href="../../../../statics/styles/template_Gates.css"> -->
    <link rel="stylesheet" href="../../../statics/styles/esa_es_la_question.css">
    <!--link a right section-->
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
        <!-- <div class="secciones_workSpace"></div> -->
        <div id="menu" class="contenedor" style = "display: grid">
            <div class="principal">
                <div><h1>Esa</h1></div>
                <div><h1>es la</h1></div>
                <div><h1>Question</h1></div>
                <div id="clase"><h4>Clase</h4></div>
                <div></div>
                <div id="privado"><h4>Privado</h4></div>
            </div>
        </div>
        <!-- Si es docente y da a clase-->
        <div id="crear" class="contenedor" style = "display: none">
            <div class="principal">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div><h1>Crear +</h1></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- Si es alumno y da a clase -->
        <div id="elegir_asignacion" class="contenedor" style = "display: none">
            <div class="choose">
                <div><h4>Elige tu curso: </h4></div>
                <div id="cursos_disponibles"></div>
                <div><h4>Elige la asignación: </h4></div>
                <div id="asignaciones_curso"></div>
            </div>            
        </div>
        <div id="start_asignacion_e" class="contenedor" style = "display: none">
            <div class="start_asignacion">
                <div></div> <div></div> <div></div>
                <div></div> <div class="tbtn">Empezar</div> <div></div>
                <div></div> <div></div> <div class="tbtn" id="regresar_aA">Regresar</div>
            </div>
        </div>
    </section>
    <script src="../../js/JUEGOS/Esa_es_la_question.js"></script>  
</body>
</html>