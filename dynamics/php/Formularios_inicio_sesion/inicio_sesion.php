<?php
    if(isset($_SESSION["NumeroCuenta"])){
        header("location: ./sesion.php");
    }
    else if(isset($_SESSION["RFC"])){
        header("location : ./sesion_profesor.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="../statics/styles/estilos_formulario_inicio_sesion.css"> 
</head>
<body>
    <center><h1>Inicio de sesión</h1></center>
    

    <div class="padre">
        <div class="contenedor-alumno" >
        <form action="./sesion.php" method="post" target="_self">

                <legend id="subtitle">Inicio de sesión para alumn@s</legend><br>

                <label for="NumeroCuenta"  id="letritas">Número de cuenta: </label>
                <input type="number"  name="NumeroCuenta"><br><br>

                <label for="contrasena"  id="letritas">Contraseña: </label>
                <input type="password" name="contrasena"><br><br>

                <button type="submit" id="btn">Enviar</button><br><br>
                <button type="reset" id="btn-borrar">Borrar formulario</button>
        </form>
        </div><br><br>

         <div class="contenedor-profesor"  >
        <form action="./sesion_profesor.php" method="post" target="_self">

                <legend id="subtitle">Inicio de sesión para profesorxs</legend><br>

                <label for="RFC"  id="letritas">RFC: </label>
                <input type="text" name="RFC"><br><br>

                <label for="contrasena"  id="letritas">Contraseña: </label>
                <input type="password" name="contrasenaProfesor"><br><br>

                <button type="submit" id="btn">Enviar</button><br><br>
                <button type="reset" id="btn-borrar" >Borrar formulario</button>
        </form>
        </div>

     </div>
</body>
</html>