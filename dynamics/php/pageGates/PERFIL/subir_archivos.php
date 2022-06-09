
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../../../js/PERFIL/perfil.js"></script>
    <title>Perfil</title>
   
</head>
<body>
    <div class="opciones">
        <button id="btn-despliegue"> Editar perfil </button>
    </div><br>

    <div id="contenedor-mostrar" style="display:none"></div>


    <div id="contenedor-editar" style="display:none">
     
        <!-- <div><h2></h2></div> -->
        <div class="campo-form"><label>Nombre</label> <input type="text" name="nombre-usuario"></div><br>
        <div class="campo-form"><label>Apellidos</label> <input type="text" name="apellidos"></div><br>
        <div class="campo-form"><label>Apodo</label> <input type="text" name="nickname"></div><br>
        <div class="campo-form"><label>Descripción</label><br>
        <textarea name="descripcion" id="descrip" cols="60" rows="10"></textarea>
        </div><br>
        <!-- <div class="campo-form"> -->
            <form id="form-nuevo" action="./subir_archivos.php" method="POST" enctype="multipart/form-data">
                <label>Nombre que desea asignarle a su foto</label>
                <input type="text" name="nombre"><br><br>
                <input type="file" name="archivo"><br><br>
                <input type="submit" Value="Actualizar foto"><br><br>
                <input type="reset"> 
            </form>
        <!-- </div><br><br> -->
        <!-- id="contenedor-imagen" style="display:none" -->
        <button id="btn-enviar">Enviar</button>
            
    </div>
        <!-- <form action='./subir_archivos.php' method='POST' enctype='multipart/form-data'>
                <label>Nombre que desea ponerle a su foto</label>
                <input type='text' name='nombre'><br/><br/>
                <input type='file' name='archivo'><br/><br/>
                <input type='submit' Value='Actualizar foto'><br/><br/>
                <input type='reset'>           
        </form> -->
    
        
</body>
</html>

<?php
require "../../config/config.php";
require "../../config/common_queries.php";
//conectando con la BD
$conexion = connect();

if(!$conexion){
    echo "La conexión ha fallado"; 
}
// else{
    
// }

    
        if(isset($_FILES['archivo'])){
            $nombre = $_POST['nombre']; 
            $name = $_FILES['archivo']['name']; 
            $extension_archivo = pathinfo($name, PATHINFO_EXTENSION); //imprimiendo la extensión del archivo
            echo $name;
            $arch=$_FILES['archivo']['tmp_name'];
            //Para seleccionar un archivo y enviarlo a la carpeta que deseamos, en este caso es img_perfil
            rename($arch, "../../../../statics/img/img_usuario/$nombre.$extension_archivo"); 
            
        }
        else{
            $carpeta=opendir("../../../../statics/img/img_usuario"); 
            $archivos=[]; //Arreglo vacío para añadirle cosas
            $hay_archivos=true; 
            $i=0; 
            while($hay_archivos){
                $archivo1 = readdir($carpeta); 
                if($archivo1!=false){ 
                    $i++; 
                    array_push($archivos, $archivo1);
                }
                else{ 
                    $hay_archivos=false; 
                }
            }
        
            if($i!=0){
                foreach($archivos as $llave => $value){
                    if($value!='.' && $value!='..'){
                    echo "<img src='../../../../statics/img/img_usuario/$value'>"; 
                    }
                }
            }
            else{
                echo "La carpeta no tiene imágenes"; 
            }
            closedir($carpeta);
        }

        
 ?>
    
