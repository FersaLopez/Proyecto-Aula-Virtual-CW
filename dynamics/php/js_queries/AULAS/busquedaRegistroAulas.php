<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;

        if(isset($_POST["id_U"]))
        {
            
                                        
            $sql = "SELECT ID_AULA, AULA.nombre, tipo, ID_GRADO FROM AULA_HAS_USUARIO NATURAL JOIN AULA NATURAL JOIN TIPO_AULA WHERE ID_USUARIO = $id_U";
            $res = mysqli_query($con, $sql);
            //$row = mysqli_fetch_array($res);        
            //$row = mysqli_fetch_assoc($res);
            $resultados = [];
            while($row = mysqli_fetch_assoc($res))
            {
                
                //var_dump($row);
                $id_Aula = $row['ID_AULA'];                
                $sql2 = "SELECT nombre FROM AULA_HAS_USUARIO NATURAL JOIN USUARIO WHERE ID_AULA = '$id_Aula' && ID_ROL = 1";
                $res2 = mysqli_query($con, $sql2);
                $row2 = mysqli_fetch_assoc($res2);
                //$row = mysqli_fetch_array($res);        
                $datos = array("nombreAula"=>$row['nombre'], "idAula"=>$row['ID_AULA'], "nombreDocente"=>$row2['nombre'], "tipoAula"=>$row['tipo'], "id_grado"=>$row['ID_GRADO']);
                $resultados[] = $datos;
            }
    
            if($res == false)
            {
                $respuesta = array("ok" => false, "texto" => "No se pudo ingresar los datos");
                echo json_encode($respuesta);
            }
            else
            {                        
                /*$respuesta = array("ok" => true, "idAula" => $idAula_prototype);
                echo json_encode($respuesta);*/                                
                //$datos = array("nombreAula"=>$row['nombre'], 'nombreDocente'=>$row2['nombre'], "tipoAula"=>$row['tipo'], "id_grado"=>$row['ID_GRADO']);
    
                $respuesta = array("ok"=>true, "datos"=>$resultados);
    
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



    }

?>