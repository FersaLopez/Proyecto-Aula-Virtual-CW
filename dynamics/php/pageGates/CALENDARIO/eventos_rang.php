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
                $sql = "SELECT * FROM eventos_rang NATURAL JOIN mes NATURAL JOIN mes_fin WHERE ID_MES = $mesAct";
                $res = mysqli_query($con, $sql);
                $resultados = [];

                //por cada registro existente, se guarda en un arreglo
                while($row = mysqli_fetch_assoc($res)){
                    $resultados[]= array(
                        "ID_MES_FIN" => $row["ID_MES_FIN"],
                        "ID_MES" => $row["ID_MES"],
                        "id" => $row["ID_EVENTO_RANG"],
                        "tipo" => $row["ID_TIPO_EVENT"],
                        "ID_AULA" => $row["ID_AULA"],
                        "ID_USUARIO" => $row["ID_USUARIO"], 
                        "ID_ASIGN" => $row["ID_ASIGN"],
                        "ID_CICLOS" => $row["ID_CICLOS"],
                        "hora_inicio" => $row["hora_inicio"],
                        "hora_final" => $row["hora_final"],
                        "dia_inicio" => $row["dia"],
                        "año" => $row["año"],
                        "fecha_comp" => $row["fecha_comp"],
                        "dia_fin" => $row["dia_fin"],
                        "fecha_comp_fin" => $row["fecha_comp_fin"],
                        "key_word" => $row["key_word"],
                        "titulo" => $row["titulo"],
                        "descripcion" => $row["descripcion"],
                        "mes_inicio" => $row["mes"],
                        "mes_fin" => $row["mes_fin"],
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