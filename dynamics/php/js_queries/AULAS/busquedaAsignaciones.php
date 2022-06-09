<?php
    require "../../config/config.php";        
    require "../../config/common_queries.php";    

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {                
        $id_U = $_POST["id_U"];
        $id_A = $_POST["id_A"];

        $sql = "SELECT ID_ASIGN, titulo, puntos, fecha_limite, ID_BLOQUE, ID_TEMA, tipo_asign FROM ASIGNACION NATURAL JOIN TIPO_ASIGN WHERE ID_AULA = '$id_A'";
        $res = mysqli_query($con, $sql);
        

        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("idA" => $row["ID_ASIGN"], "titulo" => $row["titulo"], "puntos" => $row["puntos"], "fecha_limite" => $row["fecha_limite"], "ID_BLOQUE" => $row["ID_BLOQUE"], "ID_TEMA" => $row["ID_TEMA"], "tipo_asign" => $row["tipo_asign"]);                                
            // var_dump($row);
            // echo "<br>";            
            
            $id_Asign = $row["ID_ASIGN"];
            $sql = "SELECT ID_UHA FROM USER_HAS_ASIGNACION WHERE ID_USUARIO = $id_U && ID_ASIGN = $id_Asign";
            $res2 = mysqli_query($con, $sql);
            $row2 = mysqli_fetch_assoc($res2);

            if($row2 == NULL)
            {
                $sql = "INSERT INTO USER_HAS_ASIGNACION (ID_UHA, ID_USUARIO, ID_ASIGN, ID_ESTADO_ENTREGA, fecha_entrega, calificacion, texto_tarea) 
                                VALUES (0, $id_U, $id_Asign, 3, NULL, NULL, NULL)";
                $res3 = mysqli_query($con, $sql);

                //echo $res3;

                if($res3 == false)
                {
                    echo "No se concreto UHA";
                    /*$respuesta = array("ok" => false, "texto" => "No se concreto UHA");
                    echo json_encode($respuesta);*/
                }
                                
            }
            
        }
        if($res != false)
        {
            $respuesta = array("ok" => true, "info" => $resultados);

        }
        else
            $respuesta = array("ok" => false, "texto" => "No se pudieron ingresar los datos");

        echo json_encode($respuesta);                
    }

?>