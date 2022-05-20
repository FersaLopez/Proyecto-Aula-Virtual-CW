<?php
    $nombre = (isset($_POST['nombre']) && $_POST["nombre"] != "") ? $_POST['nombre'] : "No especifico";
    $apellidos = (isset($_POST['apellidos']) && $_POST["apellidos"] != "") ? $_POST['apellidos'] : "No especifico";
    $correo = (isset($_POST['correo']) && $_POST["correo"] != "") ? $_POST['correo'] : "No especifico";
    $ncuenta = (isset($_POST['ncuenta']) && $_POST["ncuenta"] != "") ? $_POST['ncuenta'] : "No especifico";
    $telefono = (isset($_POST['telefono']) && $_POST["telefono"] != "") ? $_POST['telefono'] : "No especifico";
    $noMostrar = (isset($_POST['noMostrar']) && $_POST["noMostrar"] != "") ? $_POST['noMostrar'] : "No especifico";
    $mostrar = (isset($_POST['mostrar']) && $_POST["mostrar"] != "") ? $_POST['mostrar'] : "No especifico";
    $i = 0;

    echo 
    '
        <h1>Información registrada:</h1>
        <h3>Nombre:</h3>
        <p>'. $nombre.'</p>
        <br/>
        <h3>Apellidos:</h3>
        <p>'. $apellidos.'</p>
        <br/>
        <h3>Correo:</h3>
        <p>'. $correo. '</p>
        <br/>
        <h3>Número de cuenta:</h3>
        <p>'. $ncuenta.'</p>
        <br/>
        <h3>Teléfono:</h3>
        ';
        if($noMostrar == "no" && $mostrar == "No especifico")
        {
            echo '----';
        }
        else if($mostrar == "No especifico")
        {
            echo 'No se eligió respuesta';
            $i = 1;
        }
        if($mostrar == "si" && $noMostrar == "No especifico")
        {
            echo $telefono;
        }
        else if($noMostrar == "No especifico" && $i == 0)
        {
            echo 'No se eligió respuesta';
            $i = 0;
        }
        echo '
        <br/>
        <h3>No mostrar:</h3>
        <p>'. $noMostrar.'</p>
        <br/>
        <h3>Mostrar:</h3>
        <p>'. $mostrar.'</p>
        <br/>
    ';
?>