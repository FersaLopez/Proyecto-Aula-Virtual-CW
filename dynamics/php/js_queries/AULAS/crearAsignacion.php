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

        if($tituloA && $puntosA && $fechaEntrega && $txta_desc && $select_tipoA && $id_A && $id_U)
        {
            //echo "$tituloA<br>$txta_desc<br>$id_U<br>$puntosA<br>$fechaEntrega<br>$id_A<br>$select_tipoA";
            
            $sql = "INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) 
                        VALUES (0, '$tituloA', '$txta_desc', $id_U, $puntosA, '2022-02-16T22:03:16', '$fechaEntrega', NULL, NULL, '$id_A', $select_tipoA)";
            
            //INSERT INTO ASIGNACION (ID_ASIGN, titulo, indicaciones, ID_USUARIO, puntos, fecha_asignacion, fecha_limite, ID_BLOQUE, ID_TEMA, ID_AULA, ID_TIPO_ASIGN) VALUES (0, 'SI', 'HOLA', 1, 777, '2022-02-16T22:03:16','2022-02-16T22:03:16' , NULL, NULL, 'AGIPe8', 3)";
            
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
                $respuesta = array("ok" => true/*, "idAula" => $idAula_prototype*/);
                echo json_encode($respuesta);
            }
        }
        else
        {
            echo "No se pudo";
        }
    }
?>