<?php

    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {                    
        $marcarComp = (isset($_POST["btnEnvioAsign"]) && $_POST["btnEnvioAsign"] != "")? $_POST["btnEnvioAsign"] : false;
        
        $nombreArch = (isset($_POST["nombreArch"]) && $_POST["nombreArch"] != "")? $_POST["nombreArch"] : false;
        $doc = (isset($_FILES["archivo"]))? $_FILES["archivo"] : false;
        $comentPriv = (isset($_POST["comentPriv"]) && $_POST["comentPriv"] != "")? $_POST["comentPriv"] : false;                               

        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;                               
        $id_Asign = (isset($_POST["id_Asign"]) && $_POST["id_Asign"] != "")? $_POST["id_Asign"] : false;                               
                
        //$nombreEnRuta = "".$


        $nameArcOrig = $_FILES['archivo']['name'];
        $extArch = pathinfo($nameArcOrig, PATHINFO_EXTENSION);                

//      echo $nameArcOrig."+++++".$extArch;        


        
        //$fecha_entrega = date_create("2020-02-16 22:03:16");        
                        
        $typeDoc = false;                        
        if($extArch == "jpg" || $extArch == "pdf" || $extArch == "png" || $extArch == "txt" || $extArch == "pptx" || $extArch == "docx" || $extArch == "xlsx" )
        {
            $typeDoc = true;
        }        

        if(isset($_POST["btnEnvioAsign"]))
        {

        }
        else
        {
            if($nombreArch && $doc && $typeDoc == true)
            {
                //echo "$tituloA<br>$txta_desc<br>$id_U<br>$puntosA<br>$fechaEntrega<br>$id_A<br>$select_tipoA";                

                $sql = "SELECT fecha_asignacion FROM ASIGNACION WHERE ID_ASIGN = $id_Asign";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($res);

                if($row != NULL)
                {
                    $fechaAsign = $row["fecha_asignacion"];                                        
                    $fecha_actual = date_create("now");


                    $edoEntrega = 1;
                    if($fecha_actual > $fechaAsign)
                    {
                        $edoEntrega = 2;
                        echo "SI";
                    }        

                    $date1 = date('y-m-d');
                    $date2 = date('H:i:s');

                    //$fechaAct = date();                
                    $fechaEntrega = $date1."T".$date2;

                    $sql = "INSERT INTO USER_HAS_ASIGNACION (ID_UHA, ID_USUARIO, ID_ASIGN, ID_ESTADO_ENTREGA, fecha_entrega) 
                            VALUES (0, $id_U, $id_Asign, $edoEntrega, '$fechaEntrega')";
                
                    //INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) VALUES (0, 'SI', 'HOLA', 1, 777, '2022-02-16T22:03:16','2022-02-16T22:03:16' , NULL, NULL, 'AGIPe8', 3)";                        
                    $res = mysqli_query($con, $sql);
                    //$row = mysqli_fetch_array($res);        
        
        
                    if($res != false)
                    {
                        $idUHA = mysqli_insert_id($con);
                        //echo $idAsig;
                            
                        //$ruta_arch = "../../../../statics/media/files/materialesAulas/".$id_A.$id_U.$idAsig.$nombreArch.".".$extArch;
                        $ruta_arch = "../../../../statics/media/files/materialesAulas/"."UHA".$id_Asign.$id_U.$idUHA.$nombreArch.".".$extArch;                        
            
                        $arch = $_FILES['archivo']['tmp_name'];
                        rename($arch, $ruta_arch);
                        //echo $ruta_arch;    
            
                        $sql = "INSERT INTO ARCH_ENTREGA (ID_ARCH_ENTREGA, nombre, ruta_archivo, tipo_extension, ID_UHA) 
                                                VALUES (0, '$nombreArch', '$ruta_arch', '$extArch', $idUHA)";
                        $res = mysqli_query($con, $sql);
        
                        if($res == false)
                        {
                            echo "Hubo un error con UHA";
                        }
                        else
                        {                        
                            header("location: ../../pageGates/AULAS/insideAsignacion.php?asign=".$id_Asign);
                        }
        
                    }
                    else
                    {                        
                        echo "No se competo la 1er peticion";
                    }

                    




                }
                else
                {
                    echo "Algo salio mal";
                }

                
            }
            else
            {
                echo "Hubo un error";
            }

        }
        
    }
?>