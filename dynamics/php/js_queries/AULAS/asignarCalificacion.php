<?php
    require "../../config/config.php";        

    $con = connect();

    if(!$con)
    {
        echo "No se pudo conectar a la base";
    }
    else
    {            
        $id_UHA = (isset($_POST["id_UHA"]) && $_POST["id_UHA"] != "")? $_POST["id_UHA"] : false;
        $calificacion = (isset($_POST["calificacion"]) && $_POST["calificacion"] != "")? $_POST["calificacion"] : false;

        if($id_UHA != false && isset($_POST["calificacion"]) && !isset($_POST["bool"]))
        {
            $sql = "UPDATE USER_HAS_ASIGNACION SET ID_ESTADO_ENTREGA = 4, calificacion = $calificacion WHERE ID_UHA = $id_UHA";
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
            echo $id_UHA."<br>";
            echo $calificacion."<br>";
            //echo $_POST["bool"];
        }
    }



?>