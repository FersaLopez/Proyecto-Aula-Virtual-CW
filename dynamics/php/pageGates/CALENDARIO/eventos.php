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
                $sql = "SELECT * FROM eventos NATURAL JOIN mes WHERE ID_MES = $mesAct";
                // $eventos = "SELECT ID_EVENTO, ID_TIPO_EVENT, ID_AULA, ID_USUARIO, ID_ASIGN, ID_MES, ID_MES_FIN, ID_CICLOS, DIA, AÑO, dia_fin, titulo FROM eventos_rang WHERE ID_MES = 5";
                $res = mysqli_query($con, $sql);
                $resultados = [];

                
                
                //por cada registro existente, se guarda en un arreglo
                while($row = mysqli_fetch_assoc($res)){
                    $resultados[]= array(
                        "ID_MES" => $row["ID_MES"],
                        "id" => $row["ID_EVENTO"],
                        "tipo" => $row["ID_TIPO_EVENT"],
                        "ID_AULA" => $row["ID_AULA"],
                        "ID_USUARIO" => $row["ID_USUARIO"], 
                        "ID_ASIGN" => $row["ID_ASIGN"],
                        "ID_CICLOS" => $row["ID_CICLOS"],
                        "hora_inicio" => $row["hora_inicio"],
                        "hora_final" => $row["hora_final"],
                        "dia" => $row["dia"],
                        "año" => $row["año"],
                        "fecha_comp" => $row["fecha_comp"],
                        "key_word" => $row["key_word"],
                        "titulo" => $row["titulo"],
                        "descripcion" => $row["descripcion"],
                        "mes" => $row["mes"],

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