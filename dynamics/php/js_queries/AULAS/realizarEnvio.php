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
        $boolTarea = (isset($_POST["BOOL"]) && $_POST["BOOL"] != "")? $_POST["BOOL"] : false;
        
        $nombreArch = (isset($_POST["nombreArch"]) && $_POST["nombreArch"] != "")? $_POST["nombreArch"] : false;
        $doc = (isset($_FILES["archivo"]))? $_FILES["archivo"] : false;
        $comentPriv = (isset($_POST["comentPriv"]) && $_POST["comentPriv"] != "")? $_POST["comentPriv"] : false;                               

        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;                               
        $id_Asign = (isset($_POST["id_Asign"]) && $_POST["id_Asign"] != "")? $_POST["id_Asign"] : false;                               
                
        //$nombreEnRuta = "".$

        $typeDoc = false;                        
        if(isset($_FILES['archivo']))
        {
            $nameArcOrig = $_FILES['archivo']['name'];
            $extArch = pathinfo($nameArcOrig, PATHINFO_EXTENSION);                
            if($extArch == "jpg" || $extArch == "pdf" || $extArch == "png" || $extArch == "txt" || $extArch == "pptx" || $extArch == "docx" || $extArch == "xlsx" )
            {
                $typeDoc = true;
            }        
        }
        
        //$fecha_entrega = date_create("2020-02-16 22:03:16");                                        

        if(isset($_POST["btnEnvioAsign"]) && $id_Asign && !isset($_POST["BOOL"]))
        {
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
                    //echo "SI";
                }        

                $date1 = date('y-m-d');
                $date2 = date('H:i:s');
                            
                $fechaEntrega = $date1."T".$date2;

                $sql = "SELECT ID_UHA FROM USER_HAS_ASIGNACION WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($res);        

                if($row == NULL)
                {
                    $sql = "INSERT INTO USER_HAS_ASIGNACION (ID_UHA, ID_USUARIO, ID_ASIGN, ID_ESTADO_ENTREGA, fecha_entrega) 
                    VALUES (0, $id_U, $id_Asign, $edoEntrega, '$fechaEntrega')";            
                }
                else
                {
                    $sql = "UPDATE USER_HAS_ASIGNACION SET ID_ESTADO_ENTREGA = $edoEntrega, fecha_entrega = '$fechaEntrega' WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";                    
                }
                /*
                $res = mysqli_query($con, $sql);

                if()
                $sql = "SELECT estado FROM USER_HAS_ASIGNACION NATURAL JOIN ESTADO_ENTREGA WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
                $res = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($res);

                if($row != NULL)
                {
                    $idEdoEntrega = $row["estado"];
                }
*/

                $res = mysqli_query($con, $sql);
                //$row = mysqli_fetch_array($res);
                if($res != false)
                {
                    $respuesta = array("ok" => true, "texto" => "Marcaste tu tarea como completada");
                    echo json_encode($respuesta);
                }
                else
                {
                    $respuesta = array("ok" => false, "texto" => "No se pudieron ingresar los datos");
                    echo json_encode($respuesta);
                }

            }                                            
                         

            else
            {
                $respuesta = array("ok" => false, "texto" => "No sllego alguna variable");
                echo json_encode($respuesta);
            }
        }
        else if(isset($_POST["BOOL"]))
        {
            //$fechaAsign = $row["fecha_asignacion"];                                        
            //$fecha_actual = date_create("now");

            $edoEntrega = 3;
            /*
            if($fecha_actual > $fechaAsign)
            {
                $edoEntrega = 2;                
            } */       

            $date1 = date('y-m-d');
            $date2 = date('H:i:s');

            //$fechaAct = date();                
            //$fechaEntrega = $date1."T".$date2;
            
            $sql = "UPDATE USER_HAS_ASIGNACION SET ID_ESTADO_ENTREGA = $edoEntrega, fecha_entrega = null WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
            $res = mysqli_query($con, $sql);
            //$row = mysqli_fetch_assoc($res);

            if($res != false)
            {
                $respuesta = array("ok" => true, "texto" => "Se marco como NO COMPLETADA");
                echo json_encode($respuesta);
            }
            else
            {
                $respuesta = array("ok" => false, "texto" => "No complete mi query");
                echo json_encode($respuesta);
            }


        }
        else if(!isset($_POST["btnEnvioAsign"]))
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
                        //echo "SI";
                    }        

                    $date1 = date('y-m-d');
                    $date2 = date('H:i:s');
                                
                    $fechaEntrega = $date1."T".$date2;

                    $sql = "SELECT ID_UHA FROM USER_HAS_ASIGNACION WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
                    $res = mysqli_query($con, $sql);
                    $row = mysqli_fetch_array($res);        

                    if($row == NULL)
                    {
                        $sql = "INSERT INTO USER_HAS_ASIGNACION (ID_UHA, ID_USUARIO, ID_ASIGN, ID_ESTADO_ENTREGA, fecha_entrega) 
                        VALUES (0, $id_U, $id_Asign, $edoEntrega, '$fechaEntrega')";            
                    }
                    else
                    {
                        $sql = "UPDATE USER_HAS_ASIGNACION SET ID_ESTADO_ENTREGA = $edoEntrega, fecha_entrega = '$fechaEntrega' WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
                    }


                    
                    //INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) VALUES (0, 'SI', 'HOLA', 1, 777, '2022-02-16T22:03:16','2022-02-16T22:03:16' , NULL, NULL, 'AGIPe8', 3)";                        
                    $res = mysqli_query($con, $sql);
                    //$row = mysqli_fetch_array($res);        
        
        
                    if($res != false)
                    {
                        
                        $sql = "SELECT ID_UHA FROM USER_HAS_ASIGNACION WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
                        $res = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($res);        

                        if($row != NULL)
                        {
                            $idUHA = $row["ID_UHA"];
                            //$idUHA = mysqli_insert_id($con);
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
                            echo "No pude encontrar la ID_UHA";
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