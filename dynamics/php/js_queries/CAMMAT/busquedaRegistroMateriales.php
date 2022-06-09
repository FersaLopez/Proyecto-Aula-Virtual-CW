<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {            
        $nombreMaterial = (isset($_POST["nombreMaterial"]) && $_POST["nombreMaterial"] != "")? $_POST["nombreMaterial"] : false;
        $descripcion = (isset($_POST["descripcion"]) && $_POST["descripcion"] != "")? $_POST["descripcion"] : false;
        

        $nombreArch = (isset($_POST["nombreArch"]) && $_POST["nombreArch"] != "")? $_POST["nombreArch"] : false;
        $doc = (isset($_FILES["archivo"]))? $_FILES["archivo"] : false;

        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;                               
        //$id_Asign = (isset($_POST["id_Asign"]) && $_POST["id_Asign"] != "")? $_POST["id_Asign"] : false;                               
                
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
        

        if($nombreMaterial && $id_U)
        {
            $date1 = date('y-m-d');
            $date2 = date('H:i:s');
                        
            $fechaEntrega = $date1."T".$date2;

            $ruta_arch = "../../../../statics/media/files/materialesCamaraMateriales/"."CMMT".$id_U.$nombreArch.".".$extArch;
            $arch = $_FILES['archivo']['tmp_name'];
            rename($arch, $ruta_arch);

            $sql = "INSERT INTO PUB_CAM_MAT (ID_PUB_CMMT, ID_USUARIO, ID_MATERIAS, ID_AULA, 
            ID_TIPO_CPUB, ID_TIPO_MAT_CAMMAT, link, tema, unidad, descripcion, fecha_creacion
            fecha_Especial, cam_cora, cam_report) 
            VALUES (0, $id_U, NULL, NULL, NULL, NULL, '$ruta_arch',NULL, ,NULL, '$descripcion', '$fechaEntrega', NULL, NULL, NULL)";

            $res = mysqli_query($con, $sql);
            //$row = mysqli_fetch_array($res);        
            //$row = mysqli_fetch_assoc($res);
    
            if($res == false)
            {
                // $respuesta = array("ok" => false, "texto" => "No se pudo ingresar los datos");
                echo "Algo salio mal";
                // echo json_encode($respuesta);
            }
            else
            {                        
                header("location: ../../pageGates/CAMMAT/cammat.php");
            }
        }
        else
        {
            echo "No se pudo";
        }
    }

?>