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
    <link rel="stylesheet" href="../../../../libs/css/bootstrap.min.css">
    <title>Calendario</title>
</head>



        
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

                //para obtener la fecha de hoy
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
                
/*
                if($tipo_user != "Alumno")
                {
                    echo "
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                      Agregar evento de un día
                    </button>
                    
                    <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                      <div class='modal-dialog'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                          <!--<h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>-->
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                          </div>
                          <div class='modal-body'>
                          <h1>El evento durará 1 dia<h1>
                            <form id='formSubEv'>
                                <label class='labinp'>Evento</label>
                                    <input class='inpuforev' type='text' name='titulo' required>
                                <br>
                                <label class='labinp'>Tipo del evento</label>
                                <select class='inpuforev' name='tipo'>
                                    <option class='inpuforev' id='UNAMgeneral' value='1' >UNAM General</option>
                                    <option class='inpuforev' id='ENPcicloE' value='2' >Ciclo ENP</option>
                                    <option class='inpuforev' id='eventosENP' value='3' >Evento ENP</option>
                                    <option class='inpuforev' id='cultYsoc' value='4' >Evento cultural y/o social</option>
                                    <option class='inpuforev' id='diaFestivo' value='5' >Día festivo</option>
                                </select>
                                <br>
                                <label class='labinp'>Dia</label>
                                    <input class='inpuforev' type='number' min='1' max='31' name='dia' required>
                                    <br>
                                  <label class='labinp'>Mes</label>
                                  <input class='inpuforev' type='number' min='1' max='12' name='mes' required>
                                <br> 
                                <button type='submit' >Crear</button>

                            </form>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Salir</button>
                          </div>
                        </div>
                      </div>
                    </div>";
                }
        
        /*
                    <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop'>
                        Modificar evento
                    </button>
                  
                  <div class='modal fade' id='staticBackdrop' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>
                    <div class='modal-dialog'>
                      <div class='modal-content'>
                        <div class='modal-header'>
                          <h5 class='modal-title' id='staticBackdropLabel'>Modal title</h5>
                          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                          ...
                        </div>
                        <div class='modal-footer'>
                          <button type='submit' class='btn btn-secondary' data-bs-dismiss='modal'>Crear</button>
                        </div>
                      </div>
                    </div>
                  </div>
                    ";
                }*/
               
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
    
    <div id="divEventos">
            <div id="eventosMes" class="divEventos">
                <!-- eventos de un solo dia -->
            </div>
                
            <!-- <div id="eventosMesRang" class="divEventos">
                eventos de mas de un dia 
            </div> -->
        </div>
        <!-- <footer class="footer">
        FOOTER
    </footer> -->

    <script src="../../../js/CALENDARIO/calendario.js"></script>
    <script src ="../../../../libs/js/bootstrap.bundle.min.js"></script>
</body>
</html>