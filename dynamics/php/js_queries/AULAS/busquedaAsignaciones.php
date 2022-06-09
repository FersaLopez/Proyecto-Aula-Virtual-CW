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