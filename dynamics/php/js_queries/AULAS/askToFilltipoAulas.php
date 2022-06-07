<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $sql = "SELECT ID_TIPO_AULA, privacidad, tipo FROM TIPO_AULA NATURAL JOIN PRIVACIDAD";
        $res = mysqli_query($con, $sql);
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("ID_TIPO_AULA" => $row["ID_TIPO_AULA"], "privacidad" => $row["privacidad"], "tipo" => $row["tipo"]);
            
            /*var_dump($row);
            echo "<br>";*/
            
        }

        echo json_encode($resultados);
    }

?>
