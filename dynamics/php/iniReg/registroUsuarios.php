<?php
//Pendientes las sesiones

?>

<!DOCTYPE html><!--Verificar la llegada de los GET-->
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
    <!-- <link rel="stylesheet" href="../../../statics/styles/AccesoSistema.css"> -->
    <!-- <link rel="stylesheet" href="./libs/css/bootstrap.css.map"> -->        
</head>
<body id="body">
    <header>
    <?php
        if($_GET["user"] == 1)
        {
            echo "<h1>Registro de Estudiantes</h1>";
        }
        else if($_GET["user"] == 2)
        {
            echo "<h1>Registro de Docentes</h1>";
        }
        else if($_GET["user"] == 3)
        {
            echo "<h1>Registro de Moderadores</h1>";
        }
        else if($_GET["user"] == 4)
        {
            echo "<h1>Registro de Administradores</h1>";
        }



    ?>
    
        <nav></nav>
    </header>        
    <main class="padre">
        <section>
            <article></article>
            <article></article>
        </section>        

        <!-- <div id="div_tipoUser">
            <div id="btn_alumno" class="btn_eleccion">Alumno</div>
            <div id="btn_docente" class="btn_eleccion">Docente</div>
            <div id="btn_moder" class="btn_eleccion" >Moderador</div> style="display : none"
            <div id="btn_admin" class="btn_eleccion" >Admin</div> style="display : none" 
        </div> -->
        
        
        <div id="contenedor">            
            <section id="styleBox_trans"></section>            
            <section id="sect_estud" class="conten_forms">
                <form action="./validacionRegistro.php" id="form_estud" method="POST">                    
                    <?php
                        $tipo_U = $_GET["user"];
                        echo "<input type='number' name='tipo_U' id='tipo_U' style='display: none' readonly value='$tipo_U'>";                    

                        if(isset($_GET['reg_exist']))
                        {
                            $mensaje_error = $_GET["reg_exist"];
                            echo "
                                <script>
                                    alert('$mensaje_error');
                                </script>
                                ";
                        }
                    ?>
                    

                    <label class="campo">Nombre:
                        <input id="nombre" name="nombre" type="text" class="input" required>                        
                    </label><br><br>
                    
                    <?php
                        if( $_GET["user"] == 1 || $_GET["user"] == 2)
                            echo "
                                <label class='campo'>Apellido Paterno: 
                                    <input id='apellido_pat' name='apellido_pat' type='text' class='input' required>
                                </label>
                                <br><br>

                                <label class='campo'>Apellido Materno: 
                                    <input id='apellido_mat' name='apellido_mat' type='text' class='input' required>
                                </label>
                                <br><br>
                                ";
                    ?>
                    <label class="Campo">Contraseña:
                        <input id="password" name="password" type="password">
                    </label><br/><br/>
                    <label class='campo'>Correo: 
                        <input id='correo' name='correo' type='email' class='input' required>
                    </label><br><br>
                    <?php
                        if( $_GET["user"] != 2)
                        {
                            echo "
                                <label class='campo'>Apodo: 
                                    <input id='apodo' name='apodo' type='text' class='input' required>
                                </label><br><br>
                                ";
                        }                                                                                                                                                                     
                        if( $_GET["user"] == 1)
                        {
                            echo "
                                <label class='campo'>Número de Cuenta: (con este accederas al sistema)
                                    <input id='num_ident' name='num_ident' type='text' class='input' required>
                                </label><br><br>
                                ";
                        }
                        else
                        {
                            echo "
                                <label class='campo'>RFC: (con este accederas al sistema)
                                    <input id='num_ident' name='num_ident' type='text' class='input' required>
                                </label><br><br>
                                ";
                        }

                    ?>                    
                    
                                                            
                    <!-- <label for="telefono" class="campo">Numero de teléfono</label>
                    <input type="number" id="telefono" name="telefono" class="input" required>
                    <input type="checkbox" id="noMostrar" name="noMostrar" value="no" checked>
                    <label for="noMostrar" class="mensaje">No mostrar (recomendado)</label>
                    <input type="checkbox" id="mostrar" name="mostrar" value="si">
                    <label for="mostrar" class="mensaje">Mostrar</label> -->
                    <button class="btn" type="submit">Enviar</button>
                    <button class="btn" type="reset">Borrar</button>
                </form>



                <!-- <div id="div_formAlum" class="form_iniSesiones">
                    <form id="form_alumnos" action="./validacion_Acceso.php" method="POST">
                        <input id="tipo_U" name="tipo_User" type="number" value="1" readonly style="display: none">
                        <label id="lab_identIdent" class="campo">Número de cuenta:
                            <input id="identIdent" type="text" name="identIdent" class="input" required>
                        </label>
                        <br><br>
                        <label id="lab_contra" class="campo">Contraseña:
                            <input id="contrasena" type="password" name="contrasena" class="input" required>
                        </label>                        
                        <div class="divBtn">
                            <button id="enviar_alumnos" class="btn" type="submit">Ingresar</button>
                            <button type="reset">Borrar</button>
                        </div>
                    </form>
                </div>                 -->
            </section>                  

        </div>
        
        
        <div></div>
    </main>    
    <footer>

    </footer>
    <div id="center_line" class="org_lines"></div>
    <!-- <script src="../../js/index.js"></script> -->
</body>
</html>