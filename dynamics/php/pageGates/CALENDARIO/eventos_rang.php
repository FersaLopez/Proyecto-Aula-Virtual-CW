<?php
//conexion a la base de datos 
            require "../../config/config.php"; 
            $con = connect();
            
            if(!$con)
            {
                echo "No se pudo conectar a la base";
            }
            else
            {   
                // $consigue el mes para saber que eventos tomar de la BD
                $mesAct = date('n');

                //selecciona eventos de la BD
                $sql = "SELECT ID_EVENTO_RANG, ID_TIPO_EVENT, ID_AULA, ID_USUARIO, ID_ASIGN, ID_MES, ID_CICLOS, dia, año, dia_fin, titulo FROM eventos_rang WHERE ID_MES = $mesAct";
                $res = mysqli_query($con, $sql);
                $resultados = [];

                //por cada registro existente, se guarda en un arreglo
                while($row = mysqli_fetch_assoc($res)){
                    $resultados[]= array(
                        "id_rang" => $row["ID_EVENTO_RANG"],
                        "tipo" => $row["ID_TIPO_EVENT"],
                        "ID_AULA" => $row["ID_AULA"],
                        "ID_USUARIO" => $row["ID_USUARIO"], 
                        "ID_ASIGN" => $row["ID_ASIGN"],
                        "ID_MES" => $row["ID_MES"],
                        "ID_CICLOS" => $row["ID_CICLOS"],
                        "dia_inicio" => $row["dia"],
                        "año" => $row["año"],
                        "dia_fin" => $row["dia_fin"],
                        "titulo" => $row["titulo"]
                    );
                }
              
                //verificar si el arreglo esta vacio
                $arr = count($resultados);
                //si el arreglo no tiene nada entonces se indicara 
                if($arr == 0){
                    echo json_encode($arr);
                }
                else{
                    echo json_encode($resultados);
                }
                    
            }


?>