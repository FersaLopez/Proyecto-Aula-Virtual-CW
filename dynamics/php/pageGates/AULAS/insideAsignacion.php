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
        <?php
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
                if($asign)
                {
                    // $sql = "SELECT * FROM ASIGNACION NATURAL JOIN GRUPO NATURAL JOIN TIPO_AULA NATURAL JOIN PRIVACIDAD WHERE ID_AULA = '$asign'";
                    $sql = "SELECT * FROM ASIGNACION NATURAL JOIN TIPO_ASIGN NATURAL JOIN AULA INNER JOIN MATERIAS NATURAL JOIN GRUPO ON AULA.ID_MATERIAS = MATERIAS.ID_MATERIAS WHERE ID_ASIGN = $asign";
                    //$sql = "SELECT * FROM AULA  NATURAL JOIN GRUPO NATURAL JOIN TIPO_AULA NATURAL JOIN PRIVACIDAD WHERE ID_AULA = '$aula'";
                    $res = mysqli_query($con, $sql);                
                    $row = mysqli_fetch_assoc($res);
                    
                    $titulo = $row["titulo"];
                    $indicaciones = $row["indicaciones"];
                    $puntos = $row["puntos"];
                    $fecha_limite = $row["fecha_limite"];                            
                    $tipo_asign = $row["tipo_asign"];                    
                    $materias = $row["materias"];
                    $grupo = $row["grupo"];
                    $ID_GRADO = $row["ID_GRADO"];                    
                                                            
                    
                    
                    $sql = "SELECT estado, fecha_entrega, calificacion, texto_tarea FROM USER_HAS_ASIGNACION NATURAL JOIN ESTADO_ENTREGA WHERE ID_USUARIO = $ID && ID_ASIGN = $asign";                    
                    $res = mysqli_query($con, $sql);        
                    $row = mysqli_fetch_assoc($res);

                    $id_edo_entrega = $row["estado"];
                    $fecha_entrega = $row["fecha_entrega"];
                    $calificacion = $row["calificacion"];                    
                    $texto_tarea = $row["texto_tarea"];                    
                    
                    
                    //echo "<br/><br/><br/>";
                    //var_dump($row);                    
                    
                    // $nombre = $row["nombre"];
                    // $reuniones_id= $row["reuniones_id"];
                    // $descripcion = $row["descripcion"];                            
                    // $ruta_foto = $row["ruta_foto"];
                    // $materias = $row["materias"];
                    // $grupo = $row["grupo"];
                    // $tipo = $row["tipo"];
                    // $privacidad = $row["privacidad"];                                                                                                                                                                                                         

                    // $sql = "SELECT nombre FROM AULA_HAS_USUARIO NATURAL JOIN USUARIO WHERE ID_AULA = '$aula' && ID_ROL = 1";
                    // $res = mysqli_query($con, $sql);        
                    // $row = mysqli_fetch_assoc($res);

                    // $nombreDocenteCreador = $row["nombre"];                    

                }          
                else
                {
                    echo "Algo salio mal con la asignacion";
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
                        

                        <input id='userH_As_asign' disabled value='$asign'>
                        <input id='userH_As_titulo' disabled value='$titulo'>
                        <input id='userH_As_indicaciones' disabled value='$indicaciones'>
                        <input id='userH_As_puntos' disabled value='$puntos'>
                        <input id='userH_As_fecha_limite' disabled value='$fecha_limite'>
                        <input id='userH_As_tipo_asign' disabled value='$tipo_asign'>            
                        <input id='userH_As_materias' disabled value='$materias'>            
                        <input id='userH_As_grupo' disabled value='$grupo'>            
                        <input id='userH_As_ID_GRADO' disabled value='$ID_GRADO'>            

                        <input id='userH_As_id_edo_entrega' disabled value='$id_edo_entrega'>            
                        <input id='userH_As_fecha_entrega' disabled value='$fecha_entrega'>            
                        <input id='userH_As_calificacion' disabled value='$calificacion'>            
                        <input id='userH_As_texto_tarea' disabled value='$texto_tarea'>            
                    </div>
                ";                        
        ?>

        <h1 id="tituloNombreAsign" class="h1_nombreAsign"></h1>        
        <div id="infoAsign" class="secciones_workSpace">
            <h3 id=tipoAsig></h3>
            <h3 id="puntos"></h3>
            <h2 id="indicaciones"></h2>
            <h3 id="fechaL"></h3>             
            <div id="infoAsig_sec1">
                <h2 id="materia"></h2>
                <span id="grupo"></span>
                <span id="grado"></span>                
            </div>           
            
            <?php
                $sql = "SELECT ruta_arch, nombre, tipo_arch FROM ARCH_ADJ_ASIGN WHERE ID_ASIGN = $asign";
                $res = mysqli_query($con, $sql);        
                $row = mysqli_fetch_assoc($res);

                if($row == NULL)
                {
                    echo "<h4><u>Asignación sin archivos adjuntos</u></h4>";
                }
                else
                {
                    $nombreArch = $row["nombre"];
                    $tipo_arch = $row["tipo_arch"];
                    $ruta_Archivo = $row["ruta_arch"];
                    $carpeta = opendir("../../../../statics/media/files/materialesAulas");
                    $archivos=[];        
                    $hay_archivos=true;                
                    $i=0;
                    while($hay_archivos)//Esto significa lo mismo que ($hay_archivos==true)
                    {
                        $archivo1=readdir($carpeta);
                        if($archivo1!=false)
                        {
                            //$i++;
                            //echo $archivo1."<br>";
                            if("../../../../statics/media/files/materialesAulas/".$archivo1 == $ruta_Archivo)
                            {
                                //echo "SI TE ENCONTRE";
                                echo 
                                "<a id='contenedorDescargar' download href='$ruta_Archivo'>
                                    <div id='archivoClase' class='contenedorArchivo'>
                                        <label class='contenedorArchivo'>Archivo adjunto de la Asignación</label>
                                        <h2 id='nombreArch' class='contenedorArchivo'><strong><u>$nombreArch</u></strong></h2>                                    
                                        <h4 id='extArch' class='contenedorArchivo'>Extensión del archivo: $tipo_arch</h4>
                                    </div>
                                </a>";
                            }                            
                            //array_push($archivos, $archivo1);    
                        }
                        else
                        {
                            $hay_archivos=false;
                        }
                    }        
                    //print_r($archivos);
                }                                    
            ?>
        </div>
        

        <div id="tuEntrega" class="secciones_workSpace">            
            <h1>TU ENTREGA:</h1>            
            <div id="sec2_Entrega">

            </div>
            <h2 id="estado_entrega"></h2>
            <h1 id="calif"></h1>
            <h2 id="fecha_entrega"></h2>
            <p id="text_tarea" style="display: none"></p>            
            <div>
                <button id='btnEnvioAsign'>Marcar Tarea como Completada</button>
            </div>      
            <div>
                <div id='formEnvioArchivo'>
                    <form action='../../js_queries/AULAS/realizarEnvio.php' id='formEnvioAsign' enctype='multipart/form-data' multipart='' method='POST'>
                        <div>
                            <label>Nombre del archivo: 
                                <input id='nombreArch' type='text' name='nombreArch' required>
                            </label>
                        </div>
                        <label for='archivo'>Sube un material de trabajo: </label>
                        <input type='file' name='archivo' required>                
                        <?php
                            echo"<input id='id_Asign' value='$asign' name='id_Asign' style='display: none'>";
                            echo"<input id='id_U' value='$ID' name='id_U' style='display: none'>";                    
                        
                        ?>
                        <div id="comentarioPriv">
                            <textarea name="comentPriv" id="comentPriv" cols="30" rows="10"></textarea>
                        </div>                
                        <div>
                            <button type='reset'>Borrar</button>
                            <button type='submit'>Subir Entrega</button>
                        </div>
                    </form>
                </div>                
                    <?php
                                                                                                                                                
                        $sql = "SELECT ID_UHA FROM USER_HAS_ASIGNACION WHERE ID_USUARIO = $ID && ID_ASIGN = $asign";
                        $res = mysqli_query($con, $sql);                                    

                        $row = mysqli_fetch_assoc($res);

                        //var_dump($row);
                        
                        if($row != NULL)
                        {
                            $ID_UHA = $row["ID_UHA"];
                            $sql = "SELECT ruta_archivo, nombre, tipo_extension FROM ARCH_ENTREGA WHERE ID_UHA = $ID_UHA";
                            $res = mysqli_query($con, $sql);        

                            //$row = mysqli_fetch_assoc($res);

                            if($row != NULL)
                            {
                                $resultados = [];
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $resultados[] = array("ruta_archivo" => $row["ruta_archivo"], "nombre" => $row["nombre"], "tipo_extension" => $row["tipo_extension"]);
                                    
                                    /*var_dump($row);
                                    echo "<br>";*/
                                    
                                }                                
                                //var_dump($resultados);
                                foreach($resultados as $valor)
                                {
                                    $ruta_ArchivoTareaEntregada = $valor["ruta_archivo"];
                                    $nombreArchTareaEnviada = $valor["nombre"];
                                    $tipo_archTareaEnviada = $valor["tipo_extension"];                                    
                                    
                                    echo "         
                                    <div class='archivosSubidos'>
                        
                                        <div class='contenedorArchivos'></div>                                                                                           
                                        <iframe src='$ruta_ArchivoTareaEntregada'>                                    
                                        </iframe>                            
                                        <a id='ArchivoEntregado' download href='$ruta_ArchivoTareaEntregada'>
                                            <div id='archivoEntregado'class='contenedorArchivo'>
                                                <label class='contenedorArchivo'>Archivo adjunto de tu entrega</label>
                                                <h2 id='nombreArchEntregado' class='contenedorArchivo'><strong><u>$nombreArchTareaEnviada</u></strong></h2>                                    
                                                <h4 id='extArch' class='contenedorArchivo'>Extensión del archivo: $tipo_archTareaEnviada</h4>
                                            </div>
                                        </a>
                                    </div>";
                                }



                            }
                            else{
                                echo "Sin archivos Adjuntos en la Entrega";
                            }


                        }
                        else{
                            echo "No concrete mi primera peticion";
                        }



                            
                        
                    ?>                
            </div>      
            


        </div>

<!--         
        <div class="secciones_workSpace">

        </div>

        <div class="secciones_workSpace">

        </div> -->


    </section>       
    <script src="../../../js/AULAS/insideAsignacion.js"></script> 
</body>
</html>