<?php
//Pendientes las sesiones

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Meta Hackers"><!--To be Decided-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Aula Virtual para alumnos de la Escuela Nacional Preparatoria Plantel 6: 'Antonio Caso'"><!---->    
    <meta name="keywords" content="Aula Virtual, ENP6, COYO-ROOM"><!---->
    <title>Acceso al Sistema</title>            
    <!-- Añadir icono -->
    <link rel="stylesheet" href="../../../statics/styles/AccesoSistema.css">
    <!-- <link rel="stylesheet" href="./libs/css/bootstrap.css.map"> -->        
</head>
<body id="body">
    <header>
        <h1>Inicio de Sesion</h1>
        <nav></nav>
    </header>        
    <main class="padre">    
        <section>
            <article></article>
            <article></article>
        </section>        
        <div id="div_tipoUser">
            <div id="btn_alumno" class="btn_eleccion" >Alumno</div>
            <div id="btn_docente" class="btn_eleccion" >Docente</div>
            <div id="btn_moder" class="btn_eleccion" style="display : none">Moderador</div> 
            <div id="btn_admin" class="btn_eleccion" style="display : none">Admin</div>
        </div>
        
        
        <div id="contenedor">            
            <section id="styleBox_trans"></section>
            <section id="conten_forms">
                <div id="div_formAlum" class="form_iniSesiones">
                    <form id="form_user" action="./validacion_Acceso.php" method="POST">
                        <input id="tipo_U" name="tipo_User" type="number" readonly style="display: none">
                        <label id="lab_identIdent" class="campo">Número de cuenta:
                            <input id="identIdent" type="text" name="identIdent" class="input" required>
                        </label>
                        <br><br>
                        <label id="lab_contra" class="campo">Contraseña:
                            <input id="contrasena" type="password" name="contrasena" class="input" required>
                        </label>                        
                        <div class="divBtn">
                            <button id="enviar_alumnos" class="btn" type="submit">Ingresar</button>
                            <button id="reset" type="reset">Borrar</button>
                        </div>
                    </form>
                </div>
                


                <!-- <div id="div_docentes" class="form_iniSesiones"> -->

                    <!-- <form action="./validacion_Acceso.php" method="post"> -->
                    <!-- <form id="form_docentes">
                        <label for="rfc" class="campo">RFC: </label>
                        <input type="text" id="rfc" name="RFC" class="input" required>
                        <br><br>
                        <label for="contrasena" class="campo">Contraseña: </label>
                        <input type="password" id="contrasena" name="contrasena" class="input" required>
                        <div class="divBtn">
                            <button id="enviar_docentes" class="btn" type="submit">Ingresar</button>
                            <button type="reset">Borrar</button>
                        </div>
                    </form>
                </div> -->
            </section>                        

        </div>
        
        
        <div></div>
    </main>    
    <footer>

    </footer>
    <div id="center_line" class="org_lines"></div>
    <script src="../../js/index.js"></script>
</body>
</html>