<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {
        $sql = "SELECT * FROM GRUPO";
        $res = mysqli_query($con, $sql);
        $resultados = [];
        while($row = mysqli_fetch_assoc($res))
        {
            $resultados[] = array("id_grupo" => $row["ID_GRUPO"], "grupo" => $row["grupo"]);
            
            /*var_dump($row);
            echo "<br>";*/
            
        }

        echo json_encode($resultados);
    }

?>
