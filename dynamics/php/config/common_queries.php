<?php

    // require "../config/config.php";    
    // $con = connect();
    function mysqlExistRegistroAll($registro, $conexion, $tabla, $columna, $string = false)
    {
        if($string == false)
        {
            $peticion = "SELECT * FROM $tabla WHERE $columna = $registro";                    
        }
        else
            $peticion = "SELECT * FROM $tabla WHERE $columna = '$registro'";
        $query = mysqli_query($conexion, $peticion);
        if(gettype($query) != "boolean")
        {
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);        
            //echo "Estoy regresando el arreglo <br/>";
            return $datos;
        }
        else
        {
            //echo "Estoy regresando la query(bool) <br/>";
            return $query;
        }        
    }//2 POSIBLES RETORNOS: #1: OBJETO, trnasformado a ARRAY con el registro solicitado
    //#2: boolean, cuando algo en la peticion salio mal...
    
    //var_dump(mysqlExistRegistro("315489721", $con, "usuario", "num_identificador"));


    function obtenerID($nombreId, $con, $tabla, $columna, $coincidencia, $string = false)
    {
        if($string == false)
        {
            $sql = "SELECT $nombreId FROM $tabla WHERE $columna = $coincidencia";
        }
        else
            $sql = "SELECT $nombreId FROM $tabla WHERE $columna = '$coincidencia'";
        $query = mysqli_query($con, $sql);
        if(gettype($query) != "boolean")
        {
            $datos = mysqli_fetch_array($query, MYSQLI_ASSOC);        
            //echo "Estoy regresando el arreglo <br/>";
            return $datos;
        }
        else
        {
            //echo "Estoy regresando la query(bool) <br/>";
            return $query;
        }        
    }

?>