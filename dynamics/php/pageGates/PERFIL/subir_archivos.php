
<?php

echo " 
        <form action='./subir_archivos.php' method='POST' enctype='multipart/form-data'>
            <fieldset>
                <label>Nombre que desea ponerle a su foto</label>
                <input type='text' name='nombre'><br/><br/>
                <input type='file' name='archivo'><br/><br/>
                <input type='submit' Value='Actualizar foto'><br/><br/>
                <input type='reset'>

            </fieldset>
        </form>
        ";
        if(isset($_FILES['archivo'])){
            $nombre = $_POST['nombre']; 
            $name = $_FILES['archivo']['name']; 
            $extension_archivo = pathinfo($name, PATHINFO_EXTENSION); //imprimiendo la extensión del archivo
            echo $name;
            $arch=$_FILES['archivo']['tmp_name'];
            //Para seleccionar un archivo y enviarlo a la carpeta que deseamos, en este caso es statics
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
            // print_r($archivos);
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

        // C:\xampp\htdocs\Aula_virtual\Proyecto-Aula-Virtual-CW\statics\img
?>
    
