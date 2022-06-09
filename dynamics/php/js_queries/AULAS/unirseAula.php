<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $codigoA = (isset($_POST["inpUnirmeA"]) && $_POST["inpUnirmeA"] != "")? $_POST["inpUnirmeA"] : false;
        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;
        //$codigoA = (isset($_GET["inpUnirmeA"]) && $_GET["inpUnirmeA"] != "")? $_GET["inpUnirmeA"] : false;
        
        $sql = "SELECT ID_AULA FROM AULA WHERE ID_AULA = '$codigoA'";
        
        $res = mysqli_query($con, $sql);        
        $row = mysqli_fetch_assoc($res);
        //var_dump($row);
        //echo "<br/><br/><br/>";

        if($row != NULL && $codigoA && $id_U)
        {
            
            $sql = "SELECT ID_USUARIO FROM AULA_HAS_USUARIO WHERE ID_USUARIO = $id_U && ID_AULA = '$codigoA'";
        
            $res = mysqli_query($con, $sql);        
            $row = mysqli_fetch_assoc($res);

            if($row == NULL)
            {
                                
                $sql = "INSERT INTO AULA_HAS_USUARIO (ID_AHU, ID_USUARIO, ID_AULA, ID_ROL) VALUES (0, $id_U, '$codigoA', 2)";
                $res = mysqli_query($con, $sql);                        

                if($res != false)
                {
                    $respuesta = array("ok" => true, "texto" => "Inscripción Exitosa");
                    echo json_encode($respuesta);
                }
                else
                {
                    $respuesta = array("ok" => false, "texto" => "No se pudo completar la peticion");
                    echo json_encode($respuesta);
                }

            }
            else
            {
                $respuesta = array("ok" => false, "texto" => "Ya estas inscrito en esta Aula");
                echo json_encode($respuesta);
            }
                        
        }   
        else
        {
            $respuesta = array("ok" => false, "texto" => "No existe una clase con ese Código :(");
            echo json_encode($respuesta);
        }        
    }
?>