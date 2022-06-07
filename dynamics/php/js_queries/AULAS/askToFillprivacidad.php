<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $id = (isset($_GET["tipo"]) && $_GET["tipo"] != "")? $_GET["tipo"] : false;
        
        $sql = "SELECT privacidad FROM TIPO_AULA NATURAL JOIN PRIVACIDAD WHERE ID_TIPO_AULA = $id";
        $res = mysqli_query($con, $sql);

        /*
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("privacidad" => $row["ID_MATERIAS"], "materia" => $row["materias"], "id_grado" => $row["ID_GRADO"]);
            
            /*var_dump($row);
            echo "<br>";
            
        }*/

        $row = mysqli_fetch_assoc($res);
        //var_dump($row);
        //echo "<br/><br/><br/>";

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
        
    }

?>
