<?php
    require "../../config/config.php";        
    //require "../../common_queries.php";

    $con = connect();

    
    $id_U = (isset($_POST["id_U"]) && $_POST["id_U"] != "")? $_POST["id_U"] : false;
    $id_Asign = (isset($_POST["id_Asign"]) && $_POST["id_Asign"] != "")? $_POST["id_Asign"] : false;

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {                
        
        $sql = "SELECT * FROM USER_HAS_ASIGNACION NATURAL JOIN ESTADO_ENTREGA NATURAL JOIN USUARIO WHERE ID_ASIGN = $id_Asign && ID_TIPO_USER = 1";
        $res = mysqli_query($con, $sql);
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $ID_UHA = $row["ID_UHA"];
            
            $sql2 = "SELECT nombre, ruta_archivo, tipo_extension FROM ARCH_ENTREGA WHERE ID_UHA = $ID_UHA";
            $res2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($res2);
            $query = array("UHA_related" => $row, "ARCH" => $row2);
                        
            $resultados[] = $query;            
            /*var_dump($row);
            echo "<br>";*/
            
        }

        if($res == false)
        {
            $respuesta = array("ok" => false, "texto" => "No se encontraron registros de Entregas de esta asignación :c");
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
    }


?>