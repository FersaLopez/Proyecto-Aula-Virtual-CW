<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        if(!isset($_POST["id_U"]))
        {
            $inp_nombre = (isset($_POST["inp_nombre"]) && $_POST["inp_nombre"] != "")? $_POST["inp_nombre"] : false;
            $select_materia = (isset($_POST["select_materia"]) && $_POST["select_materia"] != "")? $_POST["select_materia"] : false;
            $select_grupo = (isset($_POST["select_grupo"]) && $_POST["select_grupo"] != "")? $_POST["select_grupo"] : false;
            $txta_desc = (isset($_POST["txta_desc"]) && $_POST["txta_desc"] != "")? $_POST["txta_desc"] : false;
            $select_tipoA = (isset($_POST["select_tipoA"]) && $_POST["select_tipoA"] != "")? $_POST["select_tipoA"] : false;
            $inp_privacidad_auto = (isset($_POST["inp_privacidad_auto"]) && $_POST["inp_privacidad_auto"] != "")? $_POST["inp_privacidad_auto"] : false;
            $txta_desc = (isset($_POST["txta_desc"]) && $_POST["txta_desc"] != "")? $_POST["txta_desc"] : false;
    
    //        $lol = $_GET["lol"];
    
            // $sql = "SELECT ID_AULA FROM AULA WHERE ID_AULA = '$lol'";
            // $res = mysqli_query($con, $sql);
            // //$row = mysqli_fetch_array($res);
            // $row = mysqli_fetch_assoc($res);
    
            // if($row == NULL)
            // {
            //     echo "No encontre";
            //     var_dump($row);
            // }else{
            //     echo "Si encontre papu";
            //     var_dump($row);
            // }
    
    
            do{
                $caracteres = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890");
    
                $claveAula = '';
                $array_carac_rand = array_rand($caracteres, 6);//devuelve en arreglo con elementos aleatorios de un arreglo (1 PARAMETRO: arreglo, 2 CANTIDAD DE ELEMENTOS QUE SE DEVOVLERAN (indices))
                //$pimienta = $pimienta . caracteres[rand()]    
                $idAula_prototype = "".$caracteres[$array_carac_rand[0]] . $caracteres[$array_carac_rand[1]] . $caracteres[$array_carac_rand[2]] . $caracteres[$array_carac_rand[3]] . $caracteres[$array_carac_rand[4]] . $caracteres[$array_carac_rand[5]];
                //echo $idAula_prototype;
    
                $sql = "SELECT ID_AULA FROM AULA WHERE ID_AULA = '$idAula_prototype'";
                $res = mysqli_query($con, $sql);
                //$row = mysqli_fetch_array($res);
                $row = mysqli_fetch_assoc($res);
            }
            while($row != NULL);
    
            $sql = "INSERT INTO AULA VALUES ('$idAula_prototype', $select_materia, $select_grupo, NULL, NULL, $select_tipoA, '$inp_nombre', NULL, '$txta_desc', NULL, NULL)";
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
            $respuesta = array("ok" => true, "idAula" => $idAula_prototype);
                echo json_encode($respuesta);
            }
            
            // echo "Se logro";
            // echo "<br>";
            // echo $row;

        }
        else{
            $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;
            $idAula = (isset($_POST["idAula"]) && $_POST["idAula"] != "")? $_POST["idAula"] : false;

            if($id_U && $idAula)
            {
                $sql = "INSERT INTO AULA_HAS_USUARIO (ID_AHU, ID_USUARIO, ID_AULA, ID_ROL) VALUES (0, $id_U, '$idAula', 1)";
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





        /*
        if($row != false)
        {
            $priv = $row["privacidad"];
            $respuesta = array("ok" => true, "priv" => $priv);
            echo json_encode($respuesta);
        }                                    
        else
        {
            $respuesta = array("ok" => false, "priv" => "No se completo la peticion url");
            echo json_encode($respuesta);
        }
*/

        /*
        $sql = "SELECT ID_MATERIAS, materias, ID_GRADO FROM materias";
        $res = mysqli_query($con, $sql);
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("id" => $row["ID_MATERIAS"], "materia" => $row["materias"], "id_grado" => $row["ID_GRADO"]);
            
            /*var_dump($row);
            echo "<br>";
            
        }

        echo json_encode($resultados);*/
    }

?>