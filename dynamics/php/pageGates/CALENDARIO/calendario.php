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
    <link rel="stylesheet" href="../../../../statics/styles/template_Gates.css">

    <link rel="stylesheet" href="../../../../statics/styles/styles_calendario.css">
    <title>Calendario</title>
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
                    <div id=contDatosHidden style='display: none'>
                        <input id='userH_id' disabled value='$ID'>
                        <input id='userH_name' disabled value='$name'>
                        <input id='userH_apodo' disabled value='$apodo'>
                        <input id='userH_idTU' disabled value='$id_TU'>
                        <input id='userH_tipo' disabled value='$tipo_user'>
                        <input id='userH_grado' disabled value='$id_grado'>            
                    </div>
                ";        
        ?>

    <div id="calendario">
        <div id="textFecha">
            <!-- <div id="fecha">Mes y año </div> -->
        </div>
        <div id="gridCalen">
            <div class="diaSem">Lunes </div>
            <div class="diaSem">Martes </div>
            <div class="diaSem">Miércoles </div>
            <div class="diaSem">Jueves </div>
            <div class="diaSem">Viernes </div>
            <div class="diaSem">Sábado </div>
            <div class="diaSem">Domingo </div>

            <div id="fila6"class="gridDias">
                <!-- aqui se van a crear los dias del calendatio dependiendo de la fecha actual -->
            </div> 

        </div>
    </div>


        <?php
            $cont = 0;
            //configuracion de la zona 
            date_default_timezone_set("America/Mexico_city");
            $zona = date_default_timezone_get();

            //recibe la fecha actual
            $fecha= getdate();
            echo "
                <div id='datosFecha' style='display: none'>
            ";
                foreach($fecha as $llave => $valor)
                {
                    echo "<input id='$cont' disabled value='$valor'><br>";
                    $cont ++;
                }
            

            //Verifica si el año es bisiesto o no
           $bisiesto = date('Y');
           echo  "<input id='abis' disabled value='$bisiesto'><br>
           </div>
           ";
       
        ?>





    
    <script src="../../../js/CALENDARIO/calendario.js"></script>
</body>
</html>