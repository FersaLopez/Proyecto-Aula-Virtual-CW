<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $sql = "SELECT ID_MATERIAS, materias, ID_GRADO FROM materias";
        $res = mysqli_query($con, $sql);
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("id" => $row["ID_MATERIAS"], "materia" => $row["materias"], "id_grado" => $row["ID_GRADO"]);
            
            /*var_dump($row);
            echo "<br>";*/
            
        }

        echo json_encode($resultados);
    }

?>
