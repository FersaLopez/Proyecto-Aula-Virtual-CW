<?php

    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {            
        $tituloA = (isset($_POST["tituloA"]) && $_POST["tituloA"] != "")? $_POST["tituloA"] : false;
        $puntosA = (isset($_POST["puntosA"]) && $_POST["puntosA"] != "")? $_POST["puntosA"] : false;

        //$fechaAsign = (isset($_POST["fechaAsign"]) && $_POST["fechaAsign"] != "")? $_POST["fechaAsign"] : false;
        
        $fechaEntrega = (isset($_POST["fechaEntrega"]) && $_POST["fechaEntrega"] != "")? $_POST["fechaEntrega"] : false;
        $txta_desc = (isset($_POST["txta_desc"]) && $_POST["txta_desc"] != "")? $_POST["txta_desc"] : false;
        $select_tipoA = (isset($_POST["select_tipoA"]) && $_POST["select_tipoA"] != "")? $_POST["select_tipoA"] : false;        
        $id_A = (isset($_POST["id_A"]) && $_POST["id_A"] != "")? $_POST["id_A"] : false;
        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;

        $nombreArch = (isset($_POST["nombreArch"]) && $_POST["nombreArch"] != "")? $_POST["nombreArch"] : false;
        $doc = (isset($_FILES["archivo"]))? $_FILES["archivo"] : false;
        
        
        //$nombreEnRuta = "".$
        $nameArcOrig = $_FILES['archivo']['name'];
        $extArch = pathinfo($nameArcOrig, PATHINFO_EXTENSION);                

//        echo $nameArcOrig."+++++".$extArch;        
        
        
        $typeDoc = false;
        if($extArch == "JPG" || $extArch == "pdf" || $extArch == "png" || $extArch == "txt" || $extArch == "pptx" || $extArch == "docx" || $extArch == "xlsx" )
        {
            $typeDoc = true;
        }        

        if($tituloA && $puntosA && $fechaEntrega && $txta_desc && $select_tipoA && $id_A && $id_U && $doc && $typeDoc == true)
        {
            //echo "$tituloA<br>$txta_desc<br>$id_U<br>$puntosA<br>$fechaEntrega<br>$id_A<br>$select_tipoA";
            
            
            
            $sql = "INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) 
                        VALUES (0, '$tituloA', '$txta_desc', $id_U, $puntosA, '2022-02-16T22:03:16', '$fechaEntrega', NULL, NULL, '$id_A', $select_tipoA)";
            
            //INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) VALUES (0, 'SI', 'HOLA', 1, 777, '2022-02-16T22:03:16','2022-02-16T22:03:16' , NULL, NULL, 'AGIPe8', 3)";                        
            $res = mysqli_query($con, $sql);
            //$row = mysqli_fetch_array($res);        


            if($res != false)
            {
                $idAsig = mysqli_insert_id($con);
                //echo $idAsig;
                    
                $ruta_arch = "../../../../statics/media/files/materialesAulas/".$id_A.$id_U.$idAsig.$nombreArch.".".$extArch;
    
                $arch = $_FILES['archivo']['tmp_name'];
                rename($arch, $ruta_arch);
                //echo $ruta_arch;    
    
                $sql = "INSERT INTO ARCH_ADJ_ASIGN (ID_ARCH_ADJ_ASIGN, nombre, ruta_arch, tipo_arch, ID_ASIGN) 
                                        VALUES (0, '$nombreArch', '$ruta_arch', '$extArch', $idAsig)";
                $res = mysqli_query($con, $sql);

                if($res == false)
                {
                    $respuesta = array("ok" => false, "texto" => "No se pudo ingresar el documento");
                    echo json_encode($respuesta);
                }
                else
                {                        
                    $respuesta = array("ok" => true/*, "idAula" => $idAula_prototype*/);
                    echo json_encode($respuesta);
                }

            }
            else
            {                        
                $respuesta = array("ok" => false, "texto" => "No se concreto la peticion de creacion");
                echo json_encode($respuesta);
            }
                                

            
        }
        else
        {
            $respuesta = array("ok" => false, "texto" => "Tipo de archivo no permitido");
            echo json_encode($respuesta);
        }
    }
?>